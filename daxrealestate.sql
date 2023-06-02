-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2023 г., 07:49
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `daxrealestate`
--

-- --------------------------------------------------------

--
-- Структура таблицы `structure`
--

CREATE TABLE `structure` (
  `id` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) DEFAULT NULL,
  `author` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `structure`
--

INSERT INTO `structure` (`id`, `title`, `description`, `parent_id`, `author`) VALUES
(24, 'Независимый', 'Описание нового элемента', 0, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'Илья Владимирович', 'yakushinilya74@gmail.com', '12345', '2023-05-30 14:05:11'),
(2, 'Дима', 'dima@mail.ru', '123', '2023-05-30 16:34:47'),
(20, 'Илья', 'betmenik@mail.ru', 'RpzWr+mjFoQNOx7lULEhvw==', '2023-06-01 10:06:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `structure`
--
ALTER TABLE `structure`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `structure`
--
ALTER TABLE `structure`
  ADD CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
