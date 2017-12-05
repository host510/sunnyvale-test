-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 05 2017 г., 07:10
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sunnyvale-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `date` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `pass`, `date`) VALUES
(4, 'Михаил Гостищев', 'host510@mail.ru', 'bf794dccc72c6cf2a67caea8dda3e021', '03.12.2017'),
(5, 'Василий Пупкин', 'vasya@mail.ru', '14e1b600b1fd579f47433b88e8d85291', '03.12.2017');

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int(10) unsigned NOT NULL,
  `author` varchar(99) NOT NULL,
  `header` varchar(99) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(99) NOT NULL,
  `video` varchar(99) NOT NULL,
  `category` varchar(99) NOT NULL,
  `date` varchar(22) NOT NULL,
  `proof` int(55) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`id`, `author`, `header`, `body`, `image`, `video`, `category`, `date`, `proof`) VALUES
(1, 'Михаил Гостищев', 'Новый год и рождество', 'Скоро новый год и рождество', 'images/2a178d1aefc5bbfbbd43f0d6508_prev[1].jpg', '', 'Развлечения', '03.12.2017', 2),
(2, 'Михаил Гостищев', 'Австрия', 'Вот такие красоты бывают в Австрии', 'images/15786_900x0.jpg', '', 'Путешествия', '03.12.2017', 2),
(4, 'Василий Пупкин', 'Ёлки', 'Вот такие елки были украдены из нашего леса', 'images/029521a14c6e4081001b82f105d9ae8a.jpg', '', 'Новый год', '03.12.2017', 2),
(6, 'Василий Пупкин', 'Венеция', 'А в Венеции сейчас тепло и сыро, наверное.', 'images/5a24fcf36bc3a231114-2.jpg', '', 'Путешествия', '04.12.2017', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `main`
--
ALTER TABLE `main`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
