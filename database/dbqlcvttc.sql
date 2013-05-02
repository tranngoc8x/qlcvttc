-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2013 at 02:42 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 224),
(2, 1, NULL, NULL, 'Customers', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Elecs', 14, 37),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'listview', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'delete', 21, 22),
(13, 8, NULL, NULL, 'getJsElec', 23, 24),
(14, 1, NULL, NULL, 'Groups', 38, 51),
(15, 14, NULL, NULL, 'index', 39, 40),
(16, 14, NULL, NULL, 'view', 41, 42),
(17, 14, NULL, NULL, 'add', 43, 44),
(18, 14, NULL, NULL, 'edit', 45, 46),
(19, 14, NULL, NULL, 'delete', 47, 48),
(20, 14, NULL, NULL, 'mdelete', 49, 50),
(21, 1, NULL, NULL, 'Linhvucs', 52, 63),
(22, 21, NULL, NULL, 'index', 53, 54),
(23, 21, NULL, NULL, 'view', 55, 56),
(24, 21, NULL, NULL, 'add', 57, 58),
(25, 21, NULL, NULL, 'edit', 59, 60),
(26, 21, NULL, NULL, 'delete', 61, 62),
(27, 1, NULL, NULL, 'Positions', 64, 77),
(28, 27, NULL, NULL, 'index', 65, 66),
(29, 27, NULL, NULL, 'view', 67, 68),
(30, 27, NULL, NULL, 'add', 69, 70),
(31, 27, NULL, NULL, 'edit', 71, 72),
(32, 27, NULL, NULL, 'delete', 73, 74),
(33, 27, NULL, NULL, 'mutildelete', 75, 76),
(34, 1, NULL, NULL, 'Rooms', 78, 89),
(35, 34, NULL, NULL, 'index', 79, 80),
(36, 34, NULL, NULL, 'view', 81, 82),
(37, 34, NULL, NULL, 'add', 83, 84),
(38, 34, NULL, NULL, 'edit', 85, 86),
(39, 34, NULL, NULL, 'delete', 87, 88),
(40, 1, NULL, NULL, 'Tasks', 90, 133),
(41, 40, NULL, NULL, 'index', 91, 92),
(42, 40, NULL, NULL, 'doing', 93, 94),
(43, 40, NULL, NULL, 'done', 95, 96),
(44, 40, NULL, NULL, 'finish', 97, 98),
(45, 40, NULL, NULL, 'fail', 99, 100),
(46, 40, NULL, NULL, 'view', 101, 102),
(47, 40, NULL, NULL, 'add', 103, 104),
(48, 40, NULL, NULL, 'edit', 105, 106),
(49, 40, NULL, NULL, 'delete', 107, 108),
(50, 40, NULL, NULL, 'listns', 109, 110),
(51, 40, NULL, NULL, 'listPB', 111, 112),
(52, 40, NULL, NULL, 'listPBgv', 113, 114),
(53, 40, NULL, NULL, 'fntask', 115, 116),
(54, 40, NULL, NULL, 'getfnNV', 117, 118),
(55, 40, NULL, NULL, 'change', 119, 120),
(56, 40, NULL, NULL, 'failtask', 121, 122),
(57, 40, NULL, NULL, 'getNV', 123, 124),
(58, 40, NULL, NULL, 'getNVFail', 125, 126),
(59, 40, NULL, NULL, 'download', 127, 128),
(60, 40, NULL, NULL, 'addfile', 129, 130),
(61, 1, NULL, NULL, 'Types', 134, 145),
(62, 61, NULL, NULL, 'index', 135, 136),
(63, 61, NULL, NULL, 'view', 137, 138),
(64, 61, NULL, NULL, 'add', 139, 140),
(65, 61, NULL, NULL, 'edit', 141, 142),
(66, 61, NULL, NULL, 'delete', 143, 144),
(67, 1, NULL, NULL, 'Users', 146, 159),
(68, 67, NULL, NULL, 'index', 147, 148),
(69, 67, NULL, NULL, 'view', 149, 150),
(70, 67, NULL, NULL, 'add', 151, 152),
(71, 67, NULL, NULL, 'edit', 153, 154),
(72, 67, NULL, NULL, 'login', 155, 156),
(73, 67, NULL, NULL, 'logout', 157, 158),
(74, 1, NULL, NULL, 'Acl', 160, 205),
(75, 74, NULL, NULL, 'Acos', 161, 168),
(76, 75, NULL, NULL, 'admin_index', 162, 163),
(77, 75, NULL, NULL, 'admin_empty_acos', 164, 165),
(78, 75, NULL, NULL, 'admin_build_acl', 166, 167),
(79, 74, NULL, NULL, 'Aros', 169, 204),
(80, 79, NULL, NULL, 'admin_index', 170, 171),
(81, 79, NULL, NULL, 'admin_check', 172, 173),
(82, 79, NULL, NULL, 'admin_users', 174, 175),
(83, 79, NULL, NULL, 'admin_update_user_role', 176, 177),
(84, 79, NULL, NULL, 'admin_ajax_role_permissions', 178, 179),
(85, 79, NULL, NULL, 'admin_role_permissions', 180, 181),
(86, 79, NULL, NULL, 'admin_user_permissions', 182, 183),
(87, 79, NULL, NULL, 'admin_empty_permissions', 184, 185),
(88, 79, NULL, NULL, 'admin_clear_user_specific_permissions', 186, 187),
(89, 79, NULL, NULL, 'admin_grant_all_controllers', 188, 189),
(90, 79, NULL, NULL, 'admin_deny_all_controllers', 190, 191),
(91, 79, NULL, NULL, 'admin_get_role_controller_permission', 192, 193),
(92, 79, NULL, NULL, 'admin_grant_role_permission', 194, 195),
(93, 79, NULL, NULL, 'admin_deny_role_permission', 196, 197),
(94, 79, NULL, NULL, 'admin_get_user_controller_permission', 198, 199),
(95, 79, NULL, NULL, 'admin_grant_user_permission', 200, 201),
(96, 79, NULL, NULL, 'admin_deny_user_permission', 202, 203),
(97, 8, NULL, NULL, 'xuatra', 25, 26),
(98, 8, NULL, NULL, 'getElec', 27, 28),
(99, 8, NULL, NULL, 'file_export', 29, 30),
(100, 1, NULL, NULL, 'Nuocs', 206, 223),
(101, 100, NULL, NULL, 'index', 207, 208),
(102, 100, NULL, NULL, 'listview', 209, 210),
(103, 100, NULL, NULL, 'add', 211, 212),
(104, 100, NULL, NULL, 'delete', 213, 214),
(105, 100, NULL, NULL, 'getJsNuoc', 215, 216),
(106, 8, NULL, NULL, 'export', 31, 32),
(107, 8, NULL, NULL, 'chart', 33, 34),
(108, 8, NULL, NULL, 'chart_detail', 35, 36),
(109, 100, NULL, NULL, 'getNuoc', 217, 218),
(110, 100, NULL, NULL, 'chart', 219, 220),
(111, 100, NULL, NULL, 'chart_detail', 221, 222),
(112, 40, NULL, NULL, 'kqtask', 131, 132);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, 'Ban GiÃ¡m Ä‘á»‘c', 1, 8),
(2, NULL, 'Group', 4, 'Ban quáº£n lÃ½ TÃ²a nhÃ ', 9, 22),
(3, NULL, 'Group', 2, 'BQL cÃ¡c dá»± Ã¡n xÃ¢y dá»±ng', 23, 28),
(4, NULL, 'Group', 6, 'PhÃ²ng Káº¿ toÃ¡n', 29, 32),
(5, NULL, 'Group', 3, 'PhÃ²ng Káº¿ toÃ¡n TÃ i chÃ­nh', 33, 44),
(6, NULL, 'Group', 7, 'PhÃ²ng Ká»¹ thuáº­t', 45, 54),
(7, NULL, 'Group', 5, 'PhÃ²ng nhÃ¢n sá»±', 55, 56),
(8, 1, 'User', 1, 'admin', 2, 3),
(9, 1, 'User', 2, 'chinguyentuan', 4, 5),
(10, 6, 'User', 16, 'cuongdinhviet', 46, 47),
(11, 2, 'User', 19, 'hachule', 10, 11),
(12, 6, 'User', 20, 'haitranminh', 48, 49),
(13, 5, 'User', 21, 'hoalaithu', 34, 35),
(14, 4, 'User', 11, 'hungnguyenlam', 30, 31),
(15, 2, 'User', 12, 'huongngothanh', 12, 13),
(16, 3, 'User', 18, 'kienduongtri', 24, 25),
(17, 6, 'User', 15, 'kiennguyentrung', 50, 51),
(18, 2, 'User', 13, 'phuongdothu', 14, 15),
(19, 5, 'User', 23, 'phuongtranhoai', 36, 37),
(20, 5, 'User', 22, 'thangnguyenhong', 38, 39),
(21, 5, 'User', 3, 'thangnguyenngoc', 40, 41),
(22, 3, 'User', 25, 'thienluongduc', 26, 27),
(23, 2, 'User', 14, 'thuongnguyenhong', 16, 17),
(24, 2, 'User', 9, 'trangluukieu', 18, 19),
(25, 5, 'User', 17, 'tuanphamquoc', 42, 43),
(26, 6, 'User', 4, 'vulehong', 52, 53),
(27, 2, 'User', 24, 'yennguyenhong', 20, 21),
(29, 1, 'User', 26, '', 6, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

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
(162, 7, 22, '1', '1', '1', '1'),
(163, 16, 23, '1', '1', '1', '1');

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
  `add` varchar(255) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `chucvu` varchar(255) DEFAULT NULL,
  `ngaytl` date DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `nguoilienhe` varchar(50) DEFAULT NULL,
  `dtnguoilh` int(15) DEFAULT NULL,
  `soluongnv` int(4) DEFAULT NULL,
  `soluongxemay` int(4) DEFAULT NULL,
  `soluongoto` int(4) DEFAULT NULL,
  `ngaythue` date DEFAULT NULL,
  `ngaychamdut` date DEFAULT NULL,
  `thoihanhd` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `tax`, `email`, `phone`, `add`, `fax`, `agent`, `chucvu`, `ngaytl`, `code`, `nguoilienhe`, `dtnguoilh`, `soluongnv`, `soluongxemay`, `soluongoto`, `ngaythue`, `ngaychamdut`, `thoihanhd`) VALUES
(7, 'LienVietBank', '123456789', 'acb@gmail.com', '123456789', 'táº§ng 01', '', 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', '2007-07-07', 'LienVietBank', '', 0, 0, 0, 0, '2033-01-01', '2033-01-01', 0),
(9, 'TPB', '0100231018', 'Tpb@tpb.com.vn', '84437956668', 'táº§ng 03', '84437956669', 'Nguyá»…n HÆ°ng', 'Tá»•ng giÃ¡m Ä‘á»‘c', '2013-04-16', '', '', 0, 0, 0, 0, '2033-01-01', '2033-01-01', 0),
(10, 'Thá»‹nh PhÃ¡t', '1111111111', '123@gmail.com', '1111111', 'táº§ng 1M', '11111111', 'abc', 'abc', '2005-04-24', 'Thá»‹nh PhÃ¡t', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 36),
(11, 'Ready Mix', '1111111111', '123@gmail.com', '1111111', 'táº§ng 1M', '11111111', '1', '1', '2002-04-24', 'Ready Mix', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(12, 'Hanaro', '1111111111', '123@gmail.com', '1111111', 'táº§ng 1M', '11111111', '1', '', '2013-04-24', 'Hanaro', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 60),
(13, 'Tincom', '1111111111', '123@gmail.com', '1111111', 'táº§ng 2', '11111111', '', '', '2013-04-24', 'Tincom', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(14, 'Yurtec', '1111111111', '123@gmail.com', '1111111', 'táº§ng 5', '11111111', '', '', '2013-04-24', 'Yurtec', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(15, 'ANZ', '1111111111', '123@gmail.com', '1111111', 'táº§ng 5', '11111111', '', '', '2013-04-24', 'ANZ', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(16, 'Novellus', '1111111111', '123@gmail.com', '1111111', 'táº§ng 6', '11111111', '', '', '2013-04-24', 'Novellus', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 36),
(17, 'Báº¯c Thá»§ ÄÃ´', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'Báº¯c Thá»§ ÄÃ´', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 60),
(18, 'FPT Cap', '1111111111', '123@gmail.com', '11111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'FPT Cap', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 36),
(19, 'TÆ°á»ng Viá»‡t', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'TÆ°á»ng Viá»‡t', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 60),
(20, 'HÆ°ng Long', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'HÆ°ng Long', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 36),
(21, 'KKC', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'KKC', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(22, 'Báº£n Viá»‡t', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'Báº£n Viá»‡t', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(23, 'Minh PhÆ°Æ¡ng', '1111111111', '123@gmail.com', '1111111', 'táº§ng 8', '11111111', '', '', '2013-04-24', 'Minh PhÆ°Æ¡ng', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(24, 'Ocberthur', '1111111111', '123@gmail.com', '1111111', 'táº§ng 9', '11111111', '', '', '2013-04-24', 'Ocberthur', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(26, 'KGK', '1111111111', '123@gmail.com', '1111111', 'táº§ng 9', '11111111', '', '', '2013-04-24', 'KGK', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(27, 'Má»¹ Thá»‹nh', 'Má»¹ Thá»‹nh', '123@gmail.com', 'Má»¹ Thá»‹nh', 'táº§ng 9', 'Má»¹ Thá»‹nh', '', '', '2013-04-24', 'Má»¹ Thá»‹nh', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(29, 'TDK', '1111111111', '123@gmail.com', '1111111', 'táº§ng 9', '11111111', '', '', '2013-04-24', 'TDK', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(30, 'Hassyu', '1111111111', '123@gmail.com', '1111111', 'táº§ng 9', '11111111', '', '', '2013-04-24', 'Hassyu', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(31, 'Comit', '1111111111', '123@gmail.com', '1111111', 'táº§ng 9', '11111111', '', '', '2013-04-24', 'Comit', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(33, 'Cacbon', '1111111111', '123@gmail.com', '1111111', '10', '11111111', '', '', '2013-04-24', 'Cacbon', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(34, 'KGL', '123', '1234@gmaik.com', '1111111', 'táº§ng 10', '11111111', '', '', '2013-04-24', 'KGL', '', NULL, NULL, NULL, NULL, '2013-04-24', '2013-04-24', 24),
(36, 'ÄÃ´ng DÆ°Æ¡ng', '1111111111', '123@gmail.com', '1111111', 'táº§ng 10', '11111111', '', '', '2013-04-25', 'ÄÃ´ng DÆ°Æ¡ng', '', NULL, NULL, NULL, NULL, '2013-04-25', '2013-04-25', 24),
(37, 'MK Tech', '1111111111', '123@gmail.com', '1111111', 'táº§ng 11', '', '', '', '2013-04-26', '', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 60),
(38, 'MK Smart', '1111111111', '123@gmail.com', '11111111', 'táº§ng 12', '', '', '', '2013-04-26', 'MK Smart', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 60),
(39, 'Ingen Studio', '1111111111', '123@gmail.com', '1111111', 'táº§ng 13', '', '', '', '2013-04-26', 'Ingen Studio', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 24),
(40, 'Contracxim', '1111111111', '123@gmail.com', '1111111', 'táº§ng 13', '', '', '', '2013-04-26', 'Contracxim', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 36),
(41, 'Alliance', '1111111111', '123@gmail.com', '1111111', 'táº§ng 14', '', '', '', '2013-04-26', 'Alliance', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 36),
(42, 'Comess', '1111111111', '123@gmail.com', '1111111', 'táº§ng 15', '11111111', '', '', '2013-04-26', 'Comess', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 24),
(43, 'Phá»§ sÃ³ng', '1111111111', '123@gmail.com', '1111111', 'táº§ng 17', '', '', '', '2013-04-26', 'Phá»§ sÃ³ng', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 50),
(44, 'TTC', '1111111111', '123@gmail.com', '11111111', 'táº§ng 17', '', '', '', '2013-04-26', 'TTC', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 60),
(45, 'BQL', '1111111111', '123@gmail.com', '1111111', 'táº§ng 1', '', '', '', '2013-04-26', 'BQL', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 12),
(46, 'Thang mÃ¡y', '1111111111', '123@gmail.com', '11111111', 'táº§ng 17', '', '', '', '2013-04-26', 'Thang mÃ¡y', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 24),
(47, 'Napoly', '1', '1@123.com', '1', 'táº§ng 1', '', '', '', '2013-04-26', 'Napoly', '', NULL, NULL, NULL, NULL, '2013-04-26', '2013-04-26', 24);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `elecs`
--

INSERT INTO `elecs` (`id`, `date`, `elec`, `rooms_id`) VALUES
(1, '2013-04-01', 123, 1),
(2, '2013-04-01', 100, 2),
(3, '2013-04-01', 85, 4),
(4, '2013-04-01', 67, 3),
(5, '2013-04-01', 140, 5),
(6, '2013-04-01', 124, 6),
(7, '2013-04-01', 178, 7),
(8, '2013-04-01', 111, 8),
(9, '2013-04-02', 200, 1),
(10, '2013-04-02', 200, 2),
(11, '2013-04-02', 200, 4),
(12, '2013-04-02', 200, 3),
(13, '2013-04-02', 215, 5),
(14, '2013-04-02', 211, 6),
(15, '2013-04-02', 198, 7),
(16, '2013-04-02', 177, 8),
(17, '2013-04-03', 289, 1),
(18, '2013-04-03', 301, 2),
(19, '2013-04-03', 290, 4),
(20, '2013-04-03', 313, 3),
(21, '2013-04-03', 320, 5),
(22, '2013-04-03', 333, 6),
(23, '2013-04-03', 344, 7),
(24, '2013-04-03', 320, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `failtasks`
--

INSERT INTO `failtasks` (`id`, `tasks_id`, `users_id`, `lydo`, `status`) VALUES
(1, 1, 4, 'LÃ m láº¡i', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `linhvucs`
--

INSERT INTO `linhvucs` (`id`, `name`, `note`) VALUES
(1, 'DV Báº£o vá»‡', 'Dá»‹ch vá»¥ báº£o vá»‡'),
(4, 'DV Vá»‡ sinh', 'DV Vá»‡ sinh'),
(5, 'DV Diá»‡t cÃ´n trÃ¹ng', 'DV Diá»‡t cÃ´n trÃ¹ng'),
(6, 'Quáº£n lÃ½ nhÃ  tháº§u', 'Quáº£n lÃ½ nhÃ  tháº§u'),
(7, 'VPP', 'VÄƒn phÃ²ng pháº©m'),
(8, 'Sá»­a chá»¯a Thay tháº¿', 'Sá»­a chá»¯a Thay tháº¿'),
(9, 'DV khÃ¡ch hÃ ng', 'Dá»‹ch vá»¥ khÃ¡ch hÃ ng'),
(10, 'Báº£o trÃ¬  Báº£o dÆ°á»¡ng', 'Báº£o trÃ¬  Báº£o dÆ°á»¡ng'),
(11, 'Kiá»ƒm tra Ä‘á»‹nh ká»³', 'Kiá»ƒm tra Ä‘á»‹nh ká»³'),
(12, 'HCNS', 'HÃ nh chÃ­nh NhÃ¢n sá»±'),
(13, 'Äá»‘i ngoáº¡i', 'Äá»‘i ngoáº¡i'),
(14, 'Dá»± Ã¡n xÃ¢y dá»±ng', 'Dá»± Ã¡n xÃ¢y dá»±ng'),
(15, 'Sá»­a chá»¯a cáº£i táº¡o xÃ¢y dá»±ng', 'Sá»­a chá»¯a cáº£i táº¡o xÃ¢y dá»±ng ( trong TÃ²a nhÃ )');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `users_id`, `ipadr`, `time`) VALUES
(1, 1, '117.0.9.57', '2013-05-02 02:29:50'),
(3, 8, '117.6.86.190', '2013-04-25 01:46:11'),
(4, 9, '123.16.241.124', '2013-04-25 08:59:06'),
(5, 10, '::1', '2013-03-08 04:46:30'),
(6, 11, '::1', '2013-03-13 05:15:47'),
(7, 12, '::1', '2013-03-13 05:15:55'),
(8, 12, '123.16.248.115', '2013-04-02 09:31:12'),
(9, 13, '113.190.210.242', '2013-04-16 01:54:55'),
(10, 14, '123.16.248.115', '2013-04-02 09:33:32'),
(11, 15, '117.6.86.190', '2013-04-03 10:39:48'),
(12, 16, '117.6.86.190', '2013-04-24 01:56:56'),
(13, 17, '117.6.86.190', '2013-04-18 02:29:39'),
(14, 18, '116.98.112.133', '2013-04-02 03:59:11'),
(15, 19, '117.6.86.190', '2013-04-03 10:43:04'),
(16, 20, '117.6.86.190', '2013-04-03 10:45:06'),
(17, 21, '117.6.86.190', '2013-04-03 10:54:30'),
(18, 22, '113.190.208.126', '2013-04-23 03:14:48'),
(19, 23, '117.6.86.190', '2013-04-16 04:45:50'),
(20, 24, '117.6.86.190', '2013-04-05 03:22:57'),
(21, 25, '117.6.86.190', '2013-04-22 12:11:14'),
(22, 26, '117.0.9.57', '2013-05-02 10:26:56');

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
-- Table structure for table `nuocs`
--

DROP TABLE IF EXISTS `nuocs`;
CREATE TABLE IF NOT EXISTS `nuocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rooms_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nuoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `nuocs`
--

INSERT INTO `nuocs` (`id`, `rooms_id`, `date`, `nuoc`) VALUES
(1, 1, '2013-04-12', 430),
(2, 2, '2013-04-12', 400),
(3, 4, '2013-04-12', 500),
(4, 1, '2013-04-11', 400),
(5, 2, '2013-04-11', 350),
(6, 4, '2013-04-11', 370),
(7, 3, '2013-04-11', 200),
(8, 5, '2013-04-11', 200),
(9, 6, '2013-04-11', 200),
(10, 7, '2013-04-11', 200),
(11, 8, '2013-04-11', 200);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `note`, `order`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', 1),
(2, 'PhÃ³ giÃ¡m Ä‘á»‘c', 'PhÃ³ giÃ¡m Ä‘á»‘c', 2),
(3, 'PhÃ³ giÃ¡m Ä‘á»‘c KTTC', 'PhÃ³ giÃ¡m Ä‘á»‘c Káº¿ toÃ¡n TÃ i chÃ­nh', 2),
(4, 'GÄ BQL', 'GiÃ¡m Ä‘á»‘c BQL TÃ²a nhÃ ', 3),
(5, 'NhÃ¢n viÃªn ká»¹ thuáº­t', 'NhÃ¢n viÃªn ká»¹ thuáº­t', 6),
(6, 'Káº¿ toÃ¡n tá»•ng há»£p', 'Káº¿ toÃ¡n tá»•ng há»£p', 5),
(7, 'PhÃ³ KTT', 'PhÃ³ Káº¿ toÃ¡n trÆ°á»Ÿng', NULL),
(8, 'KTT', 'KÃª toÃ¡n trÆ°á»Ÿng', 4),
(9, 'Káº¿ toÃ¡n thanh toÃ¡n', 'Káº¿ toÃ¡n thanh toÃ¡n', 6),
(10, 'KST', 'Ká»¹ sÆ° trÆ°á»Ÿng', NULL),
(11, 'Quáº£n lÃ½ khÃ¡ch hÃ ng', 'Quáº£n lÃ½ DV khÃ¡ch hÃ ng', NULL),
(12, 'Quáº£n lÃ½ dá»‹ch vá»¥', 'NhÃ¢n viÃªn quáº£n lÃ½ dá»‹ch vá»¥', NULL),
(13, 'Lá»… tÃ¢n', 'nhÃ¢n viÃªn lá»… tÃ¢n', NULL),
(14, 'káº¿ toÃ¡n', 'nhÃ¢n viÃªn káº¿ toÃ¡n', NULL),
(15, 'nhÃ¢n viÃªn dá»± Ã¡n', 'nhÃ¢n viÃªn dá»± Ã¡n', NULL),
(16, 'nhÃ¢n viÃªn kinh doanh', 'nhÃ¢n viÃªn kinh doanh', NULL),
(17, 'Káº¿ toÃ¡n ngÃ¢n hÃ ng', 'Káº¿ toÃ¡n ngÃ¢n hÃ ng', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

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
(36, 1, 1),
(37, 17, 3),
(38, 17, 6),
(39, 17, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `customers_id`, `room`, `first`, `ghichu`, `macto`) VALUES
(1, 7, '101', 9393, '', '10062333'),
(2, 7, '201', 13465, '', '10064613'),
(4, 7, '202', 4414, '', '10064066'),
(9, 10, 'M100', 1373, '', '10064609'),
(10, 11, 'M101', 22556, '', '10064606'),
(11, 12, 'M102', 15095, '', '10064607'),
(12, 13, '200', 43015, '', '10062402'),
(13, 9, '203', 13034, '', '11000225'),
(14, 9, '300', 12345, '', '10006419'),
(15, 9, '301', 51569, '', '10062332'),
(16, 9, '302', 7066, '', '10064593'),
(17, 9, '303', 52758, 'Äiá»u hÃ²a', '9177077'),
(18, 9, '400', 21449, '', '10064591'),
(19, 9, '401', 98185, '', '10062392'),
(20, 9, '402', 11646, '', '10064715'),
(21, 9, '403', 50395, 'Äiá»u hÃ²a', '9044399'),
(22, 9, '404', 8164, 'Äiá»u hÃ²a láº¯p thÃªm', '099601'),
(23, 9, '500', 2159, '', '10064689'),
(24, 14, '501', 27407, '', '10062353'),
(25, 15, '502', 18495, '', '11068382'),
(26, 16, '600', 11370, '', '10061913'),
(27, 16, '601', 22846, '', '10062368'),
(28, 16, '602', 1284, '', '10067986'),
(29, 16, '700', 1524, '', '10068098'),
(30, 16, '701', 66097, '', '10062362'),
(31, 16, '702', 21958, '', '10068003'),
(32, 16, '703', 8456, '', '1200781'),
(33, 17, '800', 9734, '', '10068241'),
(34, 18, '801', 24685, '', '11000205'),
(35, 18, '802', 1931, '', '73404'),
(36, 19, '803', 545, '', '130694'),
(37, 20, '804', 1311, '', '10062356'),
(38, 21, '805', 3281, '', '72543'),
(39, 22, '806', 547, '', '405200'),
(40, 23, '807', 2276, '', '10014576'),
(41, 24, '900', 1858, '', '10068097'),
(42, 26, '901', 6076, '', '11000185'),
(43, 27, '902', 3490, '', '750612'),
(44, 29, '903', 947, '', '156768'),
(45, 30, '904', 0, '', '10068238'),
(46, 31, '905', 10967, '', '10064521'),
(47, 31, '906', 13980, '', '10061741'),
(48, 33, '1000', 4628, '', '10068247'),
(49, 34, '1001', 9271, '', '10062360'),
(50, 36, '1002', 4033, '', '10068242'),
(51, 37, '1100', 14618, '', 'Cash Point & Oiwi'),
(52, 37, '1101', 48518, '', 'MK Teck'),
(53, 37, '1102', 25352, '', 'Vinapay'),
(54, 37, '1103', 51726, '', 'Äiá»u hÃ²a'),
(55, 38, '1200', 6797, '', '10068069'),
(56, 38, '1201', 38334, '', '10062380'),
(57, 38, '1202', 23064, '', '10068078'),
(58, 38, '1203', 43519, 'Äiá»u hÃ²a', '10202164'),
(59, 39, '1300', 0, '', '10064560'),
(60, 40, '1301', 30345, '', '10064062'),
(61, 40, '1302', 2825, '', '10062243'),
(62, 41, '1400', 12778, '', '10064068'),
(63, 41, '1401', 5246, '', '12013217'),
(64, 9, '1402', 6133, '', '12068266'),
(65, 15, '1403', 3139, '', '10064541'),
(66, 42, '1500', 8932, '', '10062235'),
(67, 42, '1501', 8874, '', '10062393'),
(68, 42, '1502', 1979, '', '10061782'),
(69, 43, '1600', 11941, '', 'Phá»§ SÃ³ng'),
(70, 44, '1700', 15068, '', '10063414'),
(71, 46, '1701', 1306, '', '11055278'),
(72, 47, '102', 20821, '', '10064690'),
(73, 45, '100', 9642, '', '10062314');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `start`, `end`, `users_id`, `status`, `taskid`, `types_id`, `linhvucs_id`, `done`, `folder`, `parent`) VALUES
(1, 'Báº£n demo so 1', 'Báº£n demo so 1', '2013-04-16 12:00:00', '2013-04-17 12:00:00', 1, 11, 'QLCV/TTC-1', 1, 1, 2, 'Hopdongthang4', 0),
(2, 'Gia háº¡n há»£p Ä‘á»“ng', '- Gá»­i CV THÃ”NG BÃO GIA Háº N\r\n- PhÃª duyá»‡t GÄ', '2013-04-16 12:00:00', '2013-04-25 12:00:00', 9, 11, 'Bao ve', 5, 1, 2, '', 0),
(3, 'Thay tháº¿ bÃ³ng Ä‘Ã¨n', 'Thay tháº¿ bÃ³ng Ä‘Ã¨n Alliance', '2013-04-16 12:00:00', '2013-04-17 12:00:00', 9, 11, 'Sá»­a chá»¯a nhá»', 5, 9, 2, '', 0),
(4, 'Chuáº©n bá»‹ há»“ sÆ¡ lÃ m vi sa cho GÄ Ä‘i Ãšc', '1.GPDKKD cty TTC ( cÃ´ng chá»©ng)\r\n2.Chá»©ng tá»« ná»™p thuáº¿ TNCN LÃª Anh Tuáº¥n\r\n3.Chá»©ng tá»« ná»™p thuáº¿ TNDN TTC nÄƒm trÆ°á»›c\r\n4.QD bá»• nhiá»‡m GÄ LÃª Anh Tuáº¥n cá»§a HÄTV\r\n5.GUQ cho a CHi tá»« 1/7-15/7/2013', '2013-04-18 12:00:00', '2013-04-23 12:00:00', 2, 11, 'Chuáº©n bá»‹ há»“ sÆ¡', 10, 12, 2, 'VISA\\Há»“ sÆ¡ chung', 0),
(5, 'Chuáº©n bi há»“ sÆ¡ xin xÃ¢y dá»±ng biá»‡t thá»± 51 HÃ ng Chuá»‘i', 'Chuáº©n bá»‹ há»“ sÆ¡ hiá»‡n tráº¡ng\r\nChuáº©n bá»‹ thá»§ tá»¥c ná»™p há»“ sÆ¡ xin phÃ©p\r\nLáº­p tiáº¿n Ä‘á»™ xin phÃ©p\r\n', '2013-04-17 12:00:00', '2013-05-09 12:00:00', 1, 2, 'Chuáº©n bi há»“ sÆ¡', 10, 14, 1, 'HSXD\\Biá»‡t thá»± 51 HÃ ng chuá»‘i', 0),
(6, 'HoÃ n tráº£ vá»‰a hÃ¨ TÃ²a nhÃ  máº·t phá»‘ Duy TÃ¢n', '-GiÃ¡m sÃ¡t viá»‡c hoÃ n tráº£ diá»‡n tÃ­ch vá»‰a hÃ¨ sau khi BQL Cá»¥m lÃ m há»‘ ga ngáº§m.\r\n- Bá»• sung váº­t tÆ°, tiá»n cÃ´ng cho thá»£ lÃ m hoÃ n thiá»‡n', '2013-04-18 12:00:00', '2013-04-26 12:00:00', 2, 11, 'Sá»­a chá»¯a vá»‰a hÃ¨ TÃ²a nh', 12, 15, 2, '', 0),
(7, 'BÃ¡o cÃ¡o tiáº¿n Ä‘á»™ thá»±c hiá»‡n cÃ´ng viá»‡c', 'BÃ¡o cÃ¡o tiáº¿n Ä‘á»™ thá»±c hiá»‡n cÃ´ng viá»‡c', '2013-04-25 12:00:00', '2013-04-26 12:00:00', 1, 1, 'QLCV1', 1, 1, 1, 'THANG04', 0),
(8, 'Chuyá»ƒn há»“ sÆ¡ lÃ m visa cho chi Viá»‡t Anh', '-Bo sung DKKD, giay nghi phep', '2013-04-24 12:00:00', '2013-04-25 12:00:00', 2, 1, 'Visa', 12, 12, 1, '', 4),
(9, 'BÃ¡o cÃ¡o tiáº¿n Ä‘á»™ thá»±c hiá»‡n cÃ´ng viá»‡c 1', 'BÃ¡o cÃ¡o tiáº¿n Ä‘á»™ thá»±c hiá»‡n cÃ´ng viá»‡c', '2013-05-02 12:00:00', '2013-05-02 12:00:00', 1, 1, 'QLCV1-1', 1, 1, 1, 'THANG05', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tfiles`
--

INSERT INTO `tfiles` (`id`, `name`, `type`, `tasks_id`, `folder`) VALUES
(1, '160413113156_chap06vn_7867.pdf', 1, 1, '04-2013'),
(2, '160413114735_TTC_QT_Hoat dong Bao ve. 2011 Chuan Ms Chinh .docx', 1, 2, '04-2013'),
(3, '160413115233_', 1, 3, '04-2013'),
(4, '180413020724_', 1, 4, '04-2013'),
(5, '180413022227_', 1, 5, '04-2013'),
(6, '230413083512_', 1, 6, '04-2013'),
(7, '250413024914_chapter03.pdf', 1, 7, '04-2013'),
(8, '250413030901_Vacation Approval.doc', 1, 8, '04-2013'),
(9, '180413020724_', 1, 8, '04-2013'),
(10, '160413113156_chap06vn_7867.pdf', 1, 9, '05-2013');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `note`) VALUES
(1, 'ThÃ´ng bÃ¡o', 'ThÃ´ng bÃ¡o'),
(2, 'CÃ´ng vÄƒn Ä‘áº¿n', 'CÃ´ng vÄƒn Ä‘áº¿n'),
(5, 'PhÃª duyá»‡t kinh phÃ­', 'PhÃª duyá»‡t kinh phÃ­'),
(6, 'Quyáº¿t Ä‘á»‹nh', 'Quyáº¿t Ä‘á»‹nh'),
(7, 'Thanh toÃ¡n', 'Thanh toÃ¡n'),
(10, 'Há»“ sÆ¡', 'Há»“ sÆ¡, lÆ°u trá»¯'),
(11, 'Há»£p Ä‘á»“ng kinh táº¿', 'Há»£p Ä‘á»“ng kinh táº¿'),
(12, 'Triá»ƒn khai thá»±c hiÃªn', 'Triá»ƒn khai thá»±c hiÃªn'),
(13, 'CÃ´ng vÄƒn Ä‘i', 'CÃ´ng vÄƒn Ä‘i'),
(14, 'Há»£p Ä‘á»“ng cho thuÃª', 'Há»£p Ä‘á»“ng cho thuÃª');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`, `gioitinh`, `datestart`, `dateend`, `birth`, `address`, `email`, `nghiviec`, `desc`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1, 0, '1993-03-15', '0000-00-00', '1968-01-02', 'Cáº§u Giáº¥y,HÃ  Ná»™i', 'tuan.leanh@ttctower.com.vn', 0, ''),
(2, 'Nguyá»…n Tuáº¥n Chi', 'chinguyentuan', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 1, 0, '2000-07-01', '0000-00-00', '1966-04-29', '', 'chinguyentuan@gmail.com', 0, ''),
(3, 'Nguyá»…n Ngá»c Tháº¯ng', 'thangnguyenngoc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 3, 3, 0, '1998-10-01', '0000-00-00', '1963-01-01', '', '', 0, ''),
(4, 'LÃª Há»“ng VÅ©', 'vulehong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '2010-01-01', '0000-00-00', '1969-01-01', '', 'vu.lehong@ttctower.com.vn', 0, ''),
(9, 'LÆ°u Kiá»u Trang', 'trangluukieu', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 4, 4, 1, '2011-06-01', '0000-00-00', '1987-01-01', '', 'lkieutrang@savills.com.vn', 0, ''),
(11, 'Nguyá»…n LÃ¢m HÆ°ng', 'hungnguyenlam', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 8, 6, 0, '1998-01-01', '0000-00-00', '1998-01-01', '', 'hung.nguyenlam@ttctower.com.vn', 0, ''),
(12, 'NgÃ´ Thanh HÆ°Æ¡ng', 'huongngothanh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 11, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'huong.ngothanh@ttctower.com.vn', 0, ''),
(13, 'Äá»— Thu PhÆ°Æ¡ng', 'phuongdothu', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 12, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'phuong.dothu@ttctower.com.vn', 0, ''),
(14, 'Nguyá»…n Há»“ng ThÆ°Æ¡ng', 'thuongnguyenhong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 13, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'thuong.nguyenhong@ttctower.com.vn', 0, ''),
(15, 'Nguyá»…n Trung KiÃªn', 'kiennguyentrung', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(16, 'Äinh Viá»‡t CÆ°Æ¡ng', 'cuongdinhviet', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(17, 'Pháº¡m Quá»‘c Tuáº¥n', 'tuanphamquoc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 7, 3, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', 'tuan.phamquoc@ttctower.com.vn', 0, ''),
(18, 'DÆ°Æ¡ng TrÃ­ KiÃªn', 'kienduongtri', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 15, 2, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(19, 'Chu Lá»‡ HÃ ', 'hachule', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 12, 4, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'ha.chule@ttctower.com.vn', 0, ''),
(20, 'Tráº§n Minh Háº£i', 'haitranminh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 10, 7, 0, '1998-04-03', '0000-00-00', '1998-04-03', '', 'hai.tranminh@ttctower.com.vn', 0, ''),
(21, 'Láº¡i Thu Hoa', 'hoalaithu', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 14, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'hoa.laithu@ttctower.com.vn', 0, ''),
(22, 'Nguyá»…n Há»“ng Tháº¯ng', 'thangnguyenhong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 9, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'thang.nguyenhong@ttctower.com.vn', 0, ''),
(23, 'Tráº§n HoÃ i PhÆ°Æ¡ng', 'phuongtranhoai', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 6, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'phuong.tranhoai@ttctower.com.vn', 0, ''),
(24, 'Nguyá»…n Thá»‹ HoÃ ng Yáº¿n', 'yennguyenhoang', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 13, 4, 1, '1998-04-05', '0000-00-00', '1998-04-05', '', 'yen.nguyenhoang@ttctower.com.vn', 0, ''),
(25, 'LÆ°Æ¡ng Äá»©c Thiá»‡n', 'thienluongduc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 15, 2, 0, '2013-04-05', '0000-00-00', '1998-04-05', '', '', 0, ''),
(26, 'Trang', 'trang', '0742eee136946c030ea6490c1534b3f8564297f4', 1, 1, 1, '2013-05-02', '0000-00-00', '1998-05-02', '', 'trang@gmail.com', 0, '');

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
  `ketqua` text NOT NULL,
  `datexem` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `users_id`, `tasks_id`, `status`, `done`, `ngay`, `users_chuyen`, `noidung`, `ketqua`, `datexem`) VALUES
(1, 1, 1, 1, 0, '0000-00-00 00:00:00', -1, 'Khá»Ÿi táº¡o,Báº£n demo so 1', '', '2013-04-16 11:32:20'),
(2, 4, 1, 2, 2, '2013-04-16 11:34:38', 1, 'chuyá»ƒn viá»‡c láº§n 1', '', '2013-04-16 11:39:04'),
(3, 1, 1, 2, 1, '2013-04-16 11:39:23', 4, 'chuyá»ƒn láº§n 2', '', '2013-04-16 17:02:57'),
(4, 9, 2, 1, 2, '0000-00-00 00:00:00', -1, '- PhÆ°Æ¡ng lÃ m thÃ´ng bÃ¡o, trinh duyá»‡t', '', '2013-04-16 11:47:44'),
(5, 13, 2, 2, 2, '2013-04-16 11:48:13', 9, '- LÃ m CV', '', '2013-04-16 18:12:37'),
(6, 9, 3, 1, 2, '0000-00-00 00:00:00', -1, '', '', '2013-04-16 11:52:43'),
(7, 19, 3, 2, 2, '2013-04-16 11:54:29', 9, 'Xuáº¥t khoCá»­ KTV thay tháº¿KÃ½ xÃ¡c nháº­n hoÃ n thÃ nh CÃ´ng viÃªc chuyá»ƒn BQL', '', '2013-04-16 11:54:46'),
(8, -2, 3, 11, 2, '2013-04-16 11:55:12', 19, 'HoÃ n thÃ nh', '', '0000-00-00 00:00:00'),
(9, 4, 1, 0, 1, '0000-00-00 00:00:00', 1, '', '123', '2013-04-25 08:59:21'),
(10, -2, 2, 11, 2, '2013-04-16 06:13:00', 13, 'HoÃ n thÃ nh', '', '0000-00-00 00:00:00'),
(11, 2, 4, 1, 2, '0000-00-00 00:00:00', -1, '18/4 Chuyá»ƒn Hoa chuáº©n bá»‹', '', '2013-04-18 14:07:29'),
(12, 21, 4, 2, 2, '2013-04-18 02:08:16', 2, 'Hoa chuáº©n bá»‹ HS visa cho GÄ', '', '2013-04-18 14:29:15'),
(13, 1, 5, 1, 2, '0000-00-00 00:00:00', -1, '', '', '2013-04-18 14:22:34'),
(14, 18, 5, 2, 1, '2013-04-18 02:24:19', 1, 'KiÃªn thá»±c hiá»‡n- Gáº·p anh Há»“ Quang NgÃ£i (PP ANKT) Ä‘á»ƒ Ä‘Æ°á»£c hÆ°á»›ng dáº«n gáº·p Sá»Ÿ XD- Há»“ sÆ¡ hiá»‡n tráº¡ng láº¥y á»Ÿ Thiá»‡n', '', '2013-04-18 14:26:00'),
(15, 0, 0, 0, 1, '0000-00-00 00:00:00', 0, '', '', '2013-04-22 12:11:01'),
(16, -2, 4, 11, 2, '2013-04-22 12:11:26', 21, 'HoÃ n thÃ nh', '', '0000-00-00 00:00:00'),
(17, 2, 6, 1, 2, '0000-00-00 00:00:00', -1, 'Thiá»‡n giÃ¡m sÃ¡t , káº¿t há»£p vá»›i BQL TÃ²a nhÃ  vÃ  bá»™ pháº­n ká»¹ thuáº­t thá»±c hiá»‡n.', '', '2013-04-23 08:35:17'),
(18, 25, 6, 2, 2, '2013-04-23 08:37:23', 2, 'Thiá»‡n theo dÃµi vÃ  bÃ¡o cÃ¡o.', '', '2013-04-24 11:10:16'),
(19, -2, 6, 11, 2, '2013-04-24 11:10:27', 25, 'HoÃ n thÃ nh', '', '0000-00-00 00:00:00'),
(20, 2, 1, 2, 1, '2013-04-25 09:00:35', 4, 'de nghi phe duyet', '', '2013-04-25 13:45:27'),
(21, 3, 1, 2, 2, '2013-04-25 09:00:35', 4, 'de nghi phe duyet', 'Dong y', '2013-04-25 13:46:15'),
(22, -2, 1, 11, 2, '2013-04-25 01:46:58', 3, 'HoÃ n thÃ nh', '', '0000-00-00 00:00:00'),
(23, 1, 7, 1, 1, '0000-00-00 00:00:00', -1, '', '', '2013-04-25 14:49:23'),
(24, 2, 8, 1, 1, '0000-00-00 00:00:00', -1, '', '', '0000-00-00 00:00:00'),
(25, 0, 0, 0, 1, '0000-00-00 00:00:00', 0, '', '', '2013-04-25 15:09:21'),
(26, 1, 9, 1, 1, '0000-00-00 00:00:00', -1, 'Khá»Ÿi táº¡o', '', '2013-05-02 10:11:56');
