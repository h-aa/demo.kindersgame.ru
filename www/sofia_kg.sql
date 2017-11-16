-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 09 2017 г., 12:10
-- Версия сервера: 5.5.58-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sofia_kg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `del_teachers_time`
--

CREATE TABLE IF NOT EXISTS `del_teachers_time` (
  `uniq_id` int(255) NOT NULL AUTO_INCREMENT,
  `tt_time_id` int(255) NOT NULL DEFAULT '0',
  `tt_teacher_id` int(255) NOT NULL,
  `tt_day` int(1) NOT NULL,
  `tt_hour_start` int(2) NOT NULL,
  `tt_minut_start` int(2) NOT NULL DEFAULT '0',
  `tt_hour_end` int(2) NOT NULL,
  `tt_minut_end` int(2) NOT NULL DEFAULT '0',
  `tt_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uniq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Удалённые временные промежутки' AUTO_INCREMENT=224 ;

--
-- Дамп данных таблицы `del_teachers_time`
--

INSERT INTO `del_teachers_time` (`uniq_id`, `tt_time_id`, `tt_teacher_id`, `tt_day`, `tt_hour_start`, `tt_minut_start`, `tt_hour_end`, `tt_minut_end`, `tt_active`) VALUES
(4, 8, 4, 7, 7, 0, 8, 0, 1),
(5, 9, 4, 7, 8, 0, 9, 0, 1),
(6, 10, 4, 7, 9, 0, 10, 0, 0),
(7, 11, 4, 1, 7, 0, 8, 0, 1),
(8, 12, 4, 1, 8, 0, 9, 0, 1),
(9, 13, 4, 1, 9, 0, 10, 0, 1),
(10, 14, 4, 1, 7, 0, 8, 0, 1),
(11, 15, 4, 1, 8, 0, 9, 0, 1),
(12, 16, 4, 1, 10, 0, 11, 0, 1),
(13, 17, 4, 1, 13, 0, 14, 0, 0),
(14, 18, 4, 1, 7, 0, 8, 0, 1),
(15, 19, 4, 1, 8, 0, 9, 0, 1),
(16, 20, 4, 1, 10, 0, 11, 0, 1),
(17, 21, 4, 1, 13, 0, 14, 0, 0),
(18, 22, 4, 1, 7, 0, 8, 0, 1),
(19, 23, 4, 1, 8, 0, 9, 0, 1),
(20, 24, 4, 1, 10, 0, 11, 0, 1),
(21, 25, 4, 1, 13, 0, 14, 0, 0),
(22, 26, 4, 1, 7, 0, 8, 0, 1),
(23, 27, 4, 1, 8, 0, 9, 0, 1),
(24, 28, 4, 1, 10, 0, 11, 0, 1),
(25, 29, 4, 1, 13, 0, 14, 0, 0),
(26, 30, 4, 1, 7, 0, 8, 0, 1),
(27, 31, 4, 1, 8, 0, 9, 0, 1),
(28, 32, 4, 1, 10, 0, 11, 0, 1),
(29, 33, 4, 1, 13, 0, 14, 0, 0),
(30, 34, 4, 1, 7, 0, 8, 0, 1),
(31, 35, 4, 1, 8, 0, 9, 0, 1),
(32, 36, 4, 1, 10, 0, 11, 0, 1),
(33, 37, 4, 1, 13, 0, 14, 0, 1),
(34, 38, 4, 1, 8, 0, 8, 40, 1),
(35, 39, 4, 1, 9, 0, 9, 40, 1),
(36, 40, 4, 1, 10, 0, 10, 40, 1),
(37, 41, 4, 1, 11, 0, 11, 40, 1),
(38, 42, 4, 1, 12, 0, 12, 40, 1),
(39, 43, 4, 1, 14, 0, 14, 40, 1),
(40, 44, 4, 1, 15, 0, 15, 40, 1),
(41, 45, 4, 1, 8, 0, 8, 40, 1),
(42, 46, 4, 1, 9, 0, 9, 40, 1),
(43, 47, 4, 1, 10, 0, 10, 40, 1),
(44, 48, 4, 1, 11, 0, 11, 40, 1),
(45, 49, 4, 1, 12, 0, 12, 40, 1),
(46, 50, 4, 1, 14, 0, 14, 40, 1),
(47, 51, 4, 1, 15, 0, 15, 40, 1),
(48, 52, 4, 2, 9, 0, 9, 40, 1),
(49, 53, 4, 2, 10, 0, 10, 40, 1),
(50, 54, 4, 2, 11, 0, 11, 40, 1),
(51, 55, 4, 2, 12, 0, 12, 40, 1),
(52, 56, 4, 2, 14, 0, 14, 40, 1),
(53, 57, 4, 2, 15, 0, 15, 40, 1),
(54, 58, 4, 2, 16, 0, 16, 40, 1),
(55, 59, 4, 3, 8, 0, 8, 40, 1),
(56, 60, 4, 3, 9, 0, 9, 40, 1),
(57, 61, 4, 3, 10, 0, 10, 40, 1),
(58, 62, 4, 5, 8, 0, 8, 40, 1),
(59, 63, 4, 5, 9, 0, 9, 40, 1),
(60, 64, 4, 5, 10, 0, 10, 40, 1),
(61, 65, 4, 5, 11, 0, 11, 40, 1),
(62, 112, 5, 1, 7, 0, 8, 0, 1),
(63, 113, 5, 1, 9, 0, 10, 0, 1),
(64, 114, 5, 1, 12, 0, 13, 0, 1),
(65, 115, 5, 1, 14, 0, 16, 0, 1),
(66, 116, 5, 2, 7, 0, 9, 0, 1),
(67, 117, 5, 2, 10, 0, 12, 0, 1),
(68, 118, 5, 2, 15, 0, 17, 0, 1),
(69, 119, 5, 3, 7, 0, 8, 0, 1),
(70, 120, 5, 3, 9, 0, 10, 0, 1),
(71, 121, 5, 3, 11, 0, 12, 0, 1),
(72, 122, 5, 4, 11, 30, 12, 30, 1),
(73, 123, 5, 4, 13, 0, 14, 30, 1),
(74, 124, 5, 1, 7, 0, 8, 0, 1),
(75, 125, 5, 1, 9, 0, 10, 0, 1),
(76, 126, 5, 1, 12, 0, 13, 0, 1),
(77, 127, 5, 1, 14, 0, 16, 0, 1),
(78, 128, 5, 2, 7, 0, 9, 0, 1),
(79, 129, 5, 2, 10, 0, 12, 0, 1),
(80, 130, 5, 2, 15, 0, 17, 0, 1),
(81, 131, 5, 3, 7, 0, 8, 0, 1),
(82, 132, 5, 3, 9, 0, 10, 0, 1),
(83, 133, 5, 3, 11, 0, 12, 0, 1),
(84, 134, 5, 4, 11, 30, 12, 30, 1),
(85, 135, 5, 4, 13, 0, 14, 30, 1),
(86, 136, 5, 1, 7, 0, 8, 0, 1),
(87, 137, 5, 1, 9, 0, 10, 0, 1),
(88, 138, 5, 1, 12, 0, 13, 0, 1),
(89, 139, 5, 1, 14, 0, 16, 0, 1),
(90, 140, 5, 2, 7, 0, 9, 0, 1),
(91, 141, 5, 2, 10, 0, 12, 0, 1),
(92, 142, 5, 2, 15, 0, 17, 0, 1),
(93, 143, 5, 3, 7, 0, 8, 0, 1),
(94, 144, 5, 3, 9, 0, 10, 0, 1),
(95, 145, 5, 3, 11, 0, 12, 0, 1),
(96, 146, 5, 4, 11, 30, 12, 30, 1),
(97, 147, 5, 4, 13, 0, 14, 30, 1),
(98, 66, 4, 1, 8, 0, 8, 40, 1),
(99, 67, 4, 1, 9, 0, 9, 40, 1),
(100, 68, 4, 1, 10, 0, 10, 40, 1),
(101, 69, 4, 1, 11, 0, 11, 40, 1),
(102, 70, 4, 1, 12, 0, 12, 40, 1),
(103, 71, 4, 1, 14, 0, 14, 40, 1),
(104, 72, 4, 1, 15, 0, 15, 40, 1),
(105, 73, 4, 2, 9, 0, 9, 40, 1),
(106, 74, 4, 2, 10, 0, 10, 40, 1),
(107, 75, 4, 2, 11, 0, 11, 40, 1),
(108, 76, 4, 2, 12, 0, 12, 40, 1),
(109, 77, 4, 2, 14, 0, 14, 40, 1),
(110, 78, 4, 2, 15, 0, 15, 40, 1),
(111, 79, 4, 2, 16, 0, 16, 40, 1),
(112, 80, 4, 3, 8, 0, 8, 40, 1),
(113, 81, 4, 3, 9, 0, 9, 40, 1),
(114, 82, 4, 3, 10, 0, 10, 40, 1),
(115, 83, 4, 5, 8, 0, 8, 40, 1),
(116, 84, 4, 5, 9, 0, 9, 40, 1),
(117, 85, 4, 5, 10, 0, 10, 40, 1),
(118, 86, 4, 5, 11, 0, 11, 40, 1),
(119, 160, 4, 1, 8, 0, 8, 40, 1),
(120, 161, 4, 1, 9, 0, 9, 40, 1),
(121, 162, 4, 1, 10, 0, 10, 40, 1),
(122, 163, 4, 1, 11, 0, 11, 40, 1),
(123, 164, 4, 1, 12, 0, 12, 40, 1),
(124, 165, 4, 1, 14, 0, 14, 40, 1),
(125, 166, 4, 1, 15, 0, 15, 40, 1),
(126, 167, 4, 2, 9, 0, 9, 40, 1),
(127, 168, 4, 2, 10, 0, 10, 40, 1),
(128, 169, 4, 2, 11, 0, 11, 40, 1),
(129, 170, 4, 2, 12, 0, 12, 40, 1),
(130, 171, 4, 2, 14, 0, 14, 40, 1),
(131, 172, 4, 2, 15, 0, 15, 40, 1),
(132, 173, 4, 2, 16, 0, 16, 40, 1),
(133, 174, 4, 3, 8, 0, 8, 40, 1),
(134, 175, 4, 3, 9, 0, 9, 40, 1),
(135, 176, 4, 3, 10, 0, 10, 40, 1),
(136, 177, 4, 5, 8, 0, 8, 40, 1),
(137, 178, 4, 5, 9, 0, 9, 40, 1),
(138, 179, 4, 5, 10, 0, 10, 40, 1),
(139, 180, 4, 5, 11, 0, 11, 40, 1),
(140, 181, 4, 1, 8, 0, 8, 40, 1),
(141, 182, 4, 1, 9, 0, 9, 40, 1),
(142, 183, 4, 1, 10, 0, 10, 40, 1),
(143, 184, 4, 1, 11, 0, 11, 40, 1),
(144, 185, 4, 1, 12, 0, 12, 40, 1),
(145, 186, 4, 1, 14, 0, 14, 40, 1),
(146, 187, 4, 1, 15, 0, 15, 40, 1),
(147, 188, 4, 2, 9, 0, 9, 40, 1),
(148, 189, 4, 2, 10, 0, 10, 40, 1),
(149, 190, 4, 2, 11, 0, 11, 40, 1),
(150, 191, 4, 2, 12, 0, 12, 40, 1),
(151, 192, 4, 2, 14, 0, 14, 40, 1),
(152, 193, 4, 2, 15, 0, 15, 40, 1),
(153, 194, 4, 2, 16, 0, 16, 40, 1),
(154, 195, 4, 3, 8, 0, 8, 40, 1),
(155, 196, 4, 3, 9, 0, 9, 40, 1),
(156, 197, 4, 3, 10, 0, 10, 40, 1),
(157, 198, 4, 5, 8, 0, 8, 40, 1),
(158, 199, 4, 5, 9, 0, 9, 40, 1),
(159, 200, 4, 5, 10, 0, 10, 40, 1),
(160, 201, 4, 5, 11, 0, 11, 40, 1),
(161, 202, 4, 1, 8, 0, 8, 40, 1),
(162, 203, 4, 1, 9, 0, 9, 40, 1),
(163, 204, 4, 1, 10, 0, 10, 40, 1),
(164, 205, 4, 1, 11, 0, 11, 40, 1),
(165, 206, 4, 1, 12, 0, 12, 40, 1),
(166, 207, 4, 1, 14, 0, 14, 40, 1),
(167, 208, 4, 1, 15, 0, 15, 40, 1),
(168, 209, 4, 2, 9, 0, 9, 40, 1),
(169, 210, 4, 2, 10, 0, 10, 40, 1),
(170, 211, 4, 2, 11, 0, 11, 40, 1),
(171, 212, 4, 2, 12, 0, 12, 40, 1),
(172, 213, 4, 2, 14, 0, 14, 40, 1),
(173, 214, 4, 2, 15, 0, 15, 40, 1),
(174, 215, 4, 2, 16, 0, 16, 40, 1),
(175, 216, 4, 3, 8, 0, 8, 40, 1),
(176, 217, 4, 3, 9, 0, 9, 40, 1),
(177, 218, 4, 3, 10, 0, 10, 40, 1),
(178, 219, 4, 5, 8, 0, 8, 40, 1),
(179, 220, 4, 5, 9, 0, 9, 40, 1),
(180, 221, 4, 5, 10, 0, 10, 40, 1),
(181, 222, 4, 5, 11, 0, 11, 40, 1),
(182, 223, 4, 1, 8, 0, 8, 40, 1),
(183, 224, 4, 1, 9, 0, 9, 40, 1),
(184, 225, 4, 1, 10, 0, 10, 40, 1),
(185, 226, 4, 1, 11, 0, 11, 40, 1),
(186, 227, 4, 1, 12, 0, 12, 40, 1),
(187, 228, 4, 1, 14, 0, 14, 40, 1),
(188, 229, 4, 1, 15, 0, 15, 40, 1),
(189, 230, 4, 2, 9, 0, 9, 40, 1),
(190, 231, 4, 2, 10, 0, 10, 40, 1),
(191, 232, 4, 2, 11, 0, 11, 40, 1),
(192, 233, 4, 2, 12, 0, 12, 40, 1),
(193, 234, 4, 2, 14, 0, 14, 40, 1),
(194, 235, 4, 2, 15, 0, 15, 40, 1),
(195, 236, 4, 2, 16, 0, 16, 40, 1),
(196, 237, 4, 3, 8, 0, 8, 40, 1),
(197, 238, 4, 3, 9, 0, 9, 40, 1),
(198, 239, 4, 3, 10, 0, 10, 40, 1),
(199, 240, 4, 5, 8, 0, 8, 40, 1),
(200, 241, 4, 5, 9, 0, 9, 40, 1),
(201, 242, 4, 5, 10, 0, 10, 40, 1),
(202, 243, 4, 5, 11, 0, 11, 40, 1),
(203, 244, 4, 1, 8, 0, 8, 40, 1),
(204, 245, 4, 1, 9, 0, 9, 40, 1),
(205, 246, 4, 1, 10, 0, 10, 40, 1),
(206, 247, 4, 1, 11, 0, 11, 40, 1),
(207, 248, 4, 1, 12, 0, 12, 40, 1),
(208, 249, 4, 1, 14, 0, 14, 40, 1),
(209, 250, 4, 1, 15, 0, 15, 40, 1),
(210, 251, 4, 2, 9, 0, 9, 40, 1),
(211, 252, 4, 2, 10, 0, 10, 40, 1),
(212, 253, 4, 2, 11, 0, 11, 40, 1),
(213, 254, 4, 2, 12, 0, 12, 40, 1),
(214, 255, 4, 2, 14, 0, 14, 40, 1),
(215, 256, 4, 2, 15, 0, 15, 40, 1),
(216, 257, 4, 2, 16, 0, 16, 40, 1),
(217, 258, 4, 3, 8, 0, 8, 40, 1),
(218, 259, 4, 3, 9, 0, 9, 40, 1),
(219, 260, 4, 3, 10, 0, 10, 40, 1),
(220, 261, 4, 5, 8, 0, 8, 40, 1),
(221, 262, 4, 5, 9, 0, 9, 40, 1),
(222, 263, 4, 5, 10, 0, 10, 40, 1),
(223, 264, 4, 5, 11, 0, 11, 40, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `l_id` int(255) NOT NULL AUTO_INCREMENT,
  `l_user_id` int(255) NOT NULL,
  `l_st_id` int(255) NOT NULL,
  `l_s_id` int(255) NOT NULL,
  `l_t_id` int(255) NOT NULL,
  `l_date` varchar(20) NOT NULL,
  `l_tt_id` int(255) NOT NULL,
  `l_tt_hour_start` int(2) NOT NULL,
  `l_tt_minut_start` int(2) NOT NULL,
  `l_tt_hour_end` int(2) NOT NULL,
  `l_tt_minut_end` int(2) NOT NULL,
  `l_unix_time_start` int(255) NOT NULL,
  `l_unix_time_end` int(255) NOT NULL,
  `l_unix_time_create` int(255) NOT NULL,
  `l_time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`l_id`, `l_user_id`, `l_st_id`, `l_s_id`, `l_t_id`, `l_date`, `l_tt_id`, `l_tt_hour_start`, `l_tt_minut_start`, `l_tt_hour_end`, `l_tt_minut_end`, `l_unix_time_start`, `l_unix_time_end`, `l_unix_time_create`, `l_time_create`) VALUES
(5, 1, 3, 6, 4, '10.11.2017', 283, 9, 0, 9, 40, 1510286400, 1510288800, 1510053042, '2017-11-07 11:10:42'),
(6, 1, 3, 6, 4, '13.11.2017', 265, 8, 0, 8, 40, 1510542000, 1510544400, 1510053533, '2017-11-07 11:18:53'),
(8, 1, 3, 6, 4, '13.11.2017', 269, 12, 0, 12, 40, 1510556400, 1510558800, 1510053533, '2017-11-07 11:18:53'),
(9, 1, 16, 5, 3, '08.11.2017', 289, 9, 0, 10, 0, 1510113600, 1510117200, 1510053677, '2017-11-07 11:21:17'),
(10, 1, 5, 6, 4, '13.11.2017', 266, 9, 0, 9, 40, 1510545600, 1510548000, 1510053696, '2017-11-07 11:21:36'),
(11, 1, 3, 3, 1, '08.11.2017', 95, 9, 0, 10, 0, 1510113600, 1510117200, 1510053871, '2017-11-07 11:24:31'),
(12, 1, 4, 3, 1, '08.11.2017', 95, 9, 0, 10, 0, 1510113600, 1510117200, 1510053908, '2017-11-07 11:25:08'),
(13, 1, 12, 1, 5, '08.11.2017', 155, 7, 0, 8, 0, 1510106400, 1510110000, 1510054796, '2017-11-07 11:39:56'),
(14, 1, 9, 2, 1, '08.11.2017', 96, 11, 0, 12, 0, 1510120800, 1510124400, 1510074448, '2017-11-07 17:07:28'),
(15, 1, 16, 6, 4, '14.11.2017', 272, 9, 0, 9, 40, 1510632000, 1510634400, 1510124166, '2017-11-08 06:56:06'),
(16, 1, 11, 3, 1, '10.11.2017', 105, 14, 10, 15, 0, 1510305000, 1510308000, 1510208380, '2017-11-09 06:19:40'),
(17, 1, 15, 3, 1, '10.11.2017', 105, 14, 10, 15, 0, 1510305000, 1510308000, 1510208575, '2017-11-09 06:22:55'),
(22, 1, 3, 1, 5, '09.11.2017', 159, 13, 0, 14, 30, 1510214400, 1510219800, 1510211197, '2017-11-09 07:06:37'),
(23, 1, 9, 8, 3, '13.11.2017', 287, 10, 30, 11, 30, 1510551000, 1510554600, 1510211240, '2017-11-09 07:07:20'),
(24, 1, 3, 5, 3, '13.11.2017', 287, 10, 30, 11, 30, 1510551000, 1510554600, 1510211250, '2017-11-09 07:07:30');

--
-- Триггеры `lessons`
--
DROP TRIGGER IF EXISTS `lesson_delete`;
DELIMITER //
CREATE TRIGGER `lesson_delete` AFTER DELETE ON `lessons`
 FOR EACH ROW INSERT INTO `lessons_delete`(
    `l_id`,
    `l_user_id`,
    `l_st_id`,
    `l_s_id`,
    `l_t_id`,
    `l_date`,
    `l_tt_id`,
    `l_tt_hour_start`,
    `l_tt_minut_start`,
    `l_tt_hour_end`,
    `l_tt_minut_end`,
    `l_unix_time_start`,
    `l_unix_time_end`,
    `l_unix_time_create`, 
    `l_time_create`
    ) VALUES (
    OLD.`l_id`,
    OLD.`l_user_id`,
    OLD.`l_st_id`,
    OLD.`l_s_id`,
    OLD.`l_t_id`,
    OLD.`l_date`,
    OLD.`l_tt_id`,
    OLD.`l_tt_hour_start`,
    OLD.`l_tt_minut_start`,
    OLD.`l_tt_hour_end`,
    OLD.`l_tt_minut_end`,
    OLD.`l_unix_time_start`,
    OLD.`l_unix_time_end`,
    OLD.`l_unix_time_create`, 
    OLD.`l_time_create`    
	)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `lessons_delete`
--

CREATE TABLE IF NOT EXISTS `lessons_delete` (
  `l_id` int(255) NOT NULL,
  `l_user_id` int(255) NOT NULL,
  `l_st_id` int(255) NOT NULL,
  `l_s_id` int(255) NOT NULL,
  `l_t_id` int(255) NOT NULL,
  `l_date` varchar(20) NOT NULL,
  `l_tt_id` int(255) NOT NULL,
  `l_tt_hour_start` int(2) NOT NULL,
  `l_tt_minut_start` int(2) NOT NULL,
  `l_tt_hour_end` int(2) NOT NULL,
  `l_tt_minut_end` int(2) NOT NULL,
  `l_unix_time_start` int(255) NOT NULL,
  `l_unix_time_end` int(255) NOT NULL,
  `l_unix_time_create` int(255) NOT NULL,
  `l_time_create` varchar(255) NOT NULL,
  `who_delete` int(255) NOT NULL,
  `time_delete` int(255) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lessons_delete`
--

INSERT INTO `lessons_delete` (`l_id`, `l_user_id`, `l_st_id`, `l_s_id`, `l_t_id`, `l_date`, `l_tt_id`, `l_tt_hour_start`, `l_tt_minut_start`, `l_tt_hour_end`, `l_tt_minut_end`, `l_unix_time_start`, `l_unix_time_end`, `l_unix_time_create`, `l_time_create`, `who_delete`, `time_delete`) VALUES
(4, 1, 3, 6, 4, '08.11.2017', 279, 8, 0, 8, 40, 1510110000, 1510112400, 1510052991, '2017-11-07 16:09:51', 0, 0),
(7, 1, 3, 6, 4, '13.11.2017', 267, 10, 0, 10, 40, 1510549200, 1510551600, 1510053533, '2017-11-07 16:18:53', 1, 1510135966),
(18, 1, 8, 2, 1, '16.11.2017', 104, 17, 10, 18, 0, 1510834200, 1510837200, 1510210249, '2017-11-09 11:50:49', 1, 1510210525),
(19, 1, 11, 2, 1, '16.11.2017', 104, 17, 10, 18, 0, 1510834200, 1510837200, 1510210285, '2017-11-09 11:51:25', 1, 1510210532),
(20, 1, 17, 1, 5, '09.11.2017', 159, 13, 0, 14, 30, 1510214400, 1510219800, 1510210742, '2017-11-09 11:59:02', 1, 1510210750),
(21, 1, 3, 3, 1, '09.11.2017', 101, 12, 10, 13, 0, 1510211400, 1510214400, 1510210827, '2017-11-09 12:00:27', 1, 1510210839);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `st_id` int(255) NOT NULL AUTO_INCREMENT,
  `st_first_name` varchar(255) NOT NULL,
  `st_second_name` varchar(255) NOT NULL,
  `st_third_name` varchar(255) NOT NULL,
  `st_date_birth` varchar(20) NOT NULL,
  `st_parent_fio` varchar(255) NOT NULL,
  `st_parent_phone` varchar(30) NOT NULL,
  `st_comment` text NOT NULL,
  `st_active` int(1) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`st_id`, `st_first_name`, `st_second_name`, `st_third_name`, `st_date_birth`, `st_parent_fio`, `st_parent_phone`, `st_comment`, `st_active`) VALUES
(3, 'Алиса', 'Хусаинова', 'Артуровна', '19.11.2012', 'Новикова Елена Викторовна', '+7(909)043-88-32', 'Алалия', 1),
(4, 'Руслан', 'Хусаинов', 'Артурович', '23.08.2002', 'Хусаинов Артур Амурович', '+7(967)885-66-63', 'Логопед', 1),
(5, 'Роман', 'Лузгин ', '', '01.01.2009', '', '+7(922)222-22-22', '', 1),
(6, 'Евгений', 'Клубничный', '', '01.09.2013', '', '+7(911)111-11-11', '', 1),
(7, 'София', 'Мирошниченко', '', '01.01.2007', '', '+7(933)333-33-33', '', 1),
(8, 'Алена', 'Казарина', '', '01.01.2011', '', '+7(944)444-44-44', '', 1),
(9, 'Екатерина', 'Варнава', '', '01.01.2002', '', '+7(955)555-55-55', '', 1),
(10, 'Володя0', 'Путин', '', '01.01.2013', '', '+7(966)666-66-66', '', 1),
(11, 'Алла', 'Пугачева', '', '01.01.2012', '', '+7(977)777-77-77', '', 1),
(12, 'Евгений', 'Караченцов', '', '01.01.2014', '', '+7(988)888-88-88', '', 1),
(13, 'РАС', 'Аутичный', '', '01.01.2012', '', '+7(999)999-99-99', '', 1),
(14, 'Волк', 'Медведев', '', '01.01.2012', 'Гусев Петух Львович', '+7(912)222-22-22', 'Пример', 1),
(15, 'Лис', 'Хитрый', '', '01.01.2014', '', '+7(913)333-33-33', '', 1),
(16, 'Пух', 'Винни', '', '01.01.2012', 'Астрид Линдгрен', '+7(914)444-44-44', '', 1),
(17, 'Леопольд', 'Кот', '', '01.01.2013', '', '+7(915)555-55-55', '', 1),
(18, 'Поппинс', 'Мэри', '', '01.01.2012', '', '+7(916)666-66-66', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) NOT NULL,
  `s_group` int(1) NOT NULL DEFAULT '0',
  `s_active` int(1) NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_name` (`s_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`s_id`, `s_name`, `s_group`, `s_active`) VALUES
(1, 'Логопед', 0, 1),
(2, 'Психолог', 0, 1),
(3, 'Творчество', 1, 1),
(4, 'Арт-терапия', 0, 1),
(5, 'ЛФК', 0, 1),
(6, 'АВА-терапия', 0, 1),
(8, 'Рисование', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `t_id` int(255) NOT NULL AUTO_INCREMENT,
  `t_first_name` varchar(255) NOT NULL,
  `t_second_name` varchar(255) NOT NULL,
  `t_third_name` varchar(255) NOT NULL,
  `t_phone` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_comment` text NOT NULL,
  `t_active` int(1) NOT NULL,
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `t_id` (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`t_id`, `t_first_name`, `t_second_name`, `t_third_name`, `t_phone`, `t_email`, `t_comment`, `t_active`) VALUES
(1, 'Елена', 'Новикова', 'Викторовна', '+7(909)043-88-32', 'mazaviy@mail.ru', 'Преподаватель по психологии', 1),
(2, 'Артур', 'Хусаинов', '', '+7(967)885-66-63', '', '', 0),
(3, 'Юлия', 'Пушкарёва', 'Владимировна', '+7(111)111-11-11', '', '', 1),
(4, 'Сергей', 'Иванов', 'Петрович', '+7(985)652-55-55', 'mazaviy@mail.ru', 'sdfsdfsdfsdfsdf', 1),
(5, 'Алексей', 'Новиков', 'Викторович', '+7(958)456-25-84', '', 'ываываыва', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_subject`
--

CREATE TABLE IF NOT EXISTS `teachers_subject` (
  `ts_id` int(255) NOT NULL AUTO_INCREMENT,
  `ts_subject_id` int(10) NOT NULL,
  `ts_teacher_id` int(10) NOT NULL,
  PRIMARY KEY (`ts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Дамп данных таблицы `teachers_subject`
--

INSERT INTO `teachers_subject` (`ts_id`, `ts_subject_id`, `ts_teacher_id`) VALUES
(35, 6, 4),
(36, 1, 5),
(37, 2, 1),
(38, 3, 1),
(49, 5, 3),
(50, 8, 3),
(51, 6, 2),
(52, 1, 2),
(53, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_time`
--

CREATE TABLE IF NOT EXISTS `teachers_time` (
  `tt_time_id` int(255) NOT NULL AUTO_INCREMENT,
  `tt_teacher_id` int(255) NOT NULL,
  `tt_day` int(1) NOT NULL,
  `tt_hour_start` int(2) NOT NULL,
  `tt_minut_start` int(2) NOT NULL DEFAULT '0',
  `tt_hour_end` int(2) NOT NULL,
  `tt_minut_end` int(2) NOT NULL DEFAULT '0',
  `tt_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tt_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=290 ;

--
-- Дамп данных таблицы `teachers_time`
--

INSERT INTO `teachers_time` (`tt_time_id`, `tt_teacher_id`, `tt_day`, `tt_hour_start`, `tt_minut_start`, `tt_hour_end`, `tt_minut_end`, `tt_active`) VALUES
(87, 1, 1, 8, 10, 9, 0, 1),
(88, 1, 1, 9, 10, 10, 0, 1),
(89, 1, 1, 10, 10, 11, 0, 1),
(90, 1, 1, 11, 10, 12, 0, 1),
(91, 1, 2, 14, 10, 15, 0, 1),
(92, 1, 2, 15, 10, 16, 0, 1),
(93, 1, 2, 16, 10, 17, 0, 1),
(94, 1, 2, 17, 10, 18, 0, 1),
(95, 1, 3, 9, 0, 10, 0, 1),
(96, 1, 3, 11, 0, 12, 0, 1),
(97, 1, 3, 14, 0, 15, 0, 1),
(98, 1, 4, 9, 10, 10, 0, 1),
(99, 1, 4, 10, 10, 11, 0, 1),
(100, 1, 4, 11, 10, 12, 0, 1),
(101, 1, 4, 12, 10, 13, 0, 1),
(102, 1, 4, 14, 10, 15, 0, 1),
(103, 1, 4, 16, 10, 17, 0, 1),
(104, 1, 4, 17, 10, 18, 0, 1),
(105, 1, 5, 14, 10, 15, 0, 1),
(106, 1, 5, 15, 10, 16, 0, 1),
(107, 1, 5, 16, 10, 17, 0, 1),
(108, 1, 5, 17, 10, 18, 0, 1),
(109, 1, 6, 10, 10, 11, 0, 1),
(110, 1, 6, 11, 10, 12, 0, 1),
(111, 1, 6, 12, 10, 13, 0, 1),
(148, 5, 1, 7, 0, 8, 0, 1),
(149, 5, 1, 9, 0, 10, 0, 1),
(150, 5, 1, 12, 0, 13, 0, 1),
(151, 5, 1, 14, 0, 16, 0, 1),
(152, 5, 2, 7, 0, 9, 0, 1),
(153, 5, 2, 10, 0, 12, 0, 1),
(154, 5, 2, 15, 0, 17, 0, 1),
(155, 5, 3, 7, 0, 8, 0, 1),
(156, 5, 3, 9, 0, 10, 0, 1),
(157, 5, 3, 11, 0, 12, 0, 1),
(158, 5, 4, 11, 30, 12, 30, 1),
(159, 5, 4, 13, 0, 14, 30, 1),
(265, 4, 1, 8, 0, 8, 40, 1),
(266, 4, 1, 9, 0, 9, 40, 1),
(267, 4, 1, 10, 0, 10, 40, 1),
(268, 4, 1, 11, 0, 11, 40, 1),
(269, 4, 1, 12, 0, 12, 40, 1),
(270, 4, 1, 14, 0, 14, 40, 1),
(271, 4, 1, 15, 0, 15, 40, 1),
(272, 4, 2, 9, 0, 9, 40, 1),
(273, 4, 2, 10, 0, 10, 40, 1),
(274, 4, 2, 11, 0, 11, 40, 1),
(275, 4, 2, 12, 0, 12, 40, 1),
(276, 4, 2, 14, 0, 14, 40, 1),
(277, 4, 2, 15, 0, 15, 40, 1),
(278, 4, 2, 16, 0, 16, 40, 1),
(279, 4, 3, 8, 0, 8, 40, 1),
(280, 4, 3, 9, 0, 9, 40, 1),
(281, 4, 3, 10, 0, 10, 40, 1),
(282, 4, 5, 8, 0, 8, 40, 1),
(283, 4, 5, 9, 0, 9, 40, 1),
(284, 4, 5, 10, 0, 10, 40, 1),
(285, 4, 5, 11, 0, 11, 40, 1),
(286, 3, 1, 10, 0, 11, 0, 1),
(287, 3, 1, 10, 30, 11, 30, 1),
(288, 3, 2, 8, 0, 9, 0, 1),
(289, 3, 3, 9, 0, 10, 0, 1);

--
-- Триггеры `teachers_time`
--
DROP TRIGGER IF EXISTS `delete_time_teacher`;
DELIMITER //
CREATE TRIGGER `delete_time_teacher` BEFORE DELETE ON `teachers_time`
 FOR EACH ROW INSERT INTO `del_teachers_time`(`tt_time_id`, `tt_teacher_id`, `tt_day`, `tt_hour_start`, `tt_minut_start`, `tt_hour_end`, `tt_minut_end`, `tt_active`)
VALUES 
(OLD.`tt_time_id`, OLD.`tt_teacher_id`, OLD.`tt_day`, OLD.`tt_hour_start`, OLD.`tt_minut_start`, OLD.`tt_hour_end`, OLD.`tt_minut_end`, OLD.`tt_active`)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `active`) VALUES
(1, 'admin', '0f1e7e27e7c22f42dc65ca54d8a15a86559b7273', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;