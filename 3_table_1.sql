-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 16 2017 г., 12:04
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `3_db_description`
--

-- --------------------------------------------------------

--
-- Структура таблицы `table_1`
--

CREATE TABLE `table_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_1`
--

INSERT INTO `table_1` (`id`, `name`, `description`) VALUES
(1, 'name1', 'description {*description*} description');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `table_1`
--
ALTER TABLE `table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--ЗАПРОС который заменяет в записях строки начинающиеся на {* и закачивающиеся на *} на пробел " " как-то так =)))
-- UPDATE
--   `table_1`
-- SET
--   `description` = CONCAT(
--     SUBSTRING_INDEX(`description`,'{*', 1),
--     ' ',
--     SUBSTRING(`description`, LOCATE('*}',`description`, LOCATE('{*',`description`))+2)
--   )
--   WHERE `id` = 1;