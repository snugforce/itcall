-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 16 2014 г., 16:40
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_call`
--

CREATE TABLE IF NOT EXISTS `tbl_call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `ip` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txt` text COLLATE utf8_unicode_ci,
  `office` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_call_group` (`group_id`),
  KEY `FK_call_category` (`category_id`),
  KEY `FK_call_status` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_call`
--

INSERT INTO `tbl_call` (`id`, `name`, `group_id`, `category_id`, `ip`, `txt`, `office`, `create_time`, `update_time`, `status_id`) VALUES
(1, 'Валеев', 1, 1, '127.0.0.1', 'ytfujtfujdr thgotgurg\r\ntrdgtgpxoruigfesoiu gpoitypdryrye456', '203', NULL, 1389868611, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Принтер');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `call_id` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `txt` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `FK_comment_status` (`status_id`),
  KEY `FK_comment_call` (`call_id`),
  KEY `FK_comment_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `user_id`, `call_id`, `create_time`, `status_id`, `txt`) VALUES
(4, 1, 1, 1389791164, 1, 'ghtrhythyth'),
(5, 1, 1, 1389791170, 1, 'aaaaaaaaaaaaa'),
(6, 1, 1, 1389791175, 1, 'jjjjjjjjjjjjj'),
(7, 1, 1, 1389791208, 1, 'ddddddddddd'),
(8, 1, 1, 1389868171, 3, 'Открываю заново'),
(9, 1, 1, 1389868359, 2, 'Закрываю'),
(10, 1, 1, 1389868427, 3, 'ффф'),
(11, 1, 1, 1389868438, 2, 'ыыыы'),
(12, 1, 1, 1389868587, 3, 'шшшш'),
(13, 1, 1, 1389868611, 2, 'гггггг');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_group`
--

CREATE TABLE IF NOT EXISTS `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `name`) VALUES
(1, 'Здание А'),
(2, 'Здание Б');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`, `color`) VALUES
(1, 'Выполнение', '#fcf8e3'),
(2, 'Закрыт', '#dff0d8'),
(3, 'Активен', '#f2dede');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_group` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `group_id`, `password`, `role`, `login`, `avatar`) VALUES
(1, 'admin', NULL, 'c4ca4238a0b923820dcc509a6f75849b', 'administrator', 'admin', '');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_call`
--
ALTER TABLE `tbl_call`
  ADD CONSTRAINT `FK_call_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_call_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_call_status` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_call` FOREIGN KEY (`call_id`) REFERENCES `tbl_call` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_status` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_user_group` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
