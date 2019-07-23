-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Лип 02 2019 р., 20:04
-- Версія сервера: 10.1.35-MariaDB
-- Версія PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `idAutor` int(11) DEFAULT NULL,
  `idRecord` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `text` longtext,
  `like` int(11) DEFAULT NULL,
  `disLike` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `record`
--

CREATE TABLE `record` (
  `idAutor` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  `text` longtext,
  `like` int(11) DEFAULT NULL,
  `disLike` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `urlAvatar` varchar(120) DEFAULT NULL,
  `Role` varchar(30) DEFAULT 'Follower',
  `Nick` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `Password`, `urlAvatar`, `Role`, `Nick`) VALUES
(14, 'artem@mail', 'a15784320ac1fcec8e4b10cbc88fe5437f248cbf', 'c3f6c899e95e1cdffd1d6023aa80fc6c.png', 'Follower', 'Artem'),
(15, 'artem1@mail', 'a15784320ac1fcec8e4b10cbc88fe5437f248cbf', 'd09349236e207202b4a6b0b4c938fb7b.png', 'Autor', 'Artem1'),
(16, 'artem2@mail', 'a15784320ac1fcec8e4b10cbc88fe5437f248cbf', 'd02ceb6360f13659d0209fbec4d5195f.png', 'Admin', 'Artem2');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idRecord` (`idRecord`);

--
-- Індекси таблиці `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `record` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idRecord`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
