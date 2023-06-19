-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 18 2023 р., 21:05
-- Версія сервера: 10.4.27-MariaDB
-- Версія PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `blog-post`
--
CREATE DATABASE IF NOT EXISTS `blog-post` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog-post`;

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `message`, `date`, `postId`) VALUES
(1, 'Commentator', 'commentator@gmail.com', 'This is my comment. I am commentator', '2023-06-18', 1),
(2, 'Commentator 2', 'commentator2@gmail.com', 'This is my comment. I am commentator 2', '2023-06-18', 1),
(3, 'Commentator 3', 'commentator3@gmail.com', 'This is my comment. I am commentator 3', '2023-06-18', 1),
(4, 'Commentator 4', 'commentator4@gmail.com', 'This is my comment. I am commentator 4', '2023-06-18', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `comments_num` int(11) NOT NULL,
  `comments` text NOT NULL,
  `author` varchar(64) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `post`
--

INSERT INTO `post` (`id`, `title`, `message`, `comments_num`, `comments`, `author`, `date`) VALUES
(1, 'Test post title', 'Test post message. Test post message.', 4, '4 | 3 | 2 | 1 | 0', 'test@gmail.com', '2023-06-18');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `country` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `country`, `address`) VALUES
(1, 'Test', 'test@gmail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', '+067 000 00 09', 'Ukraine', 'Kyiv, str. New Yor');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
