-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2023 г., 01:00
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `naukarudenko`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'admin2', 'a8f5f167f44f4964e6c998dee827110c', 'user', NULL, NULL),
(3, 'admin5', 'bff149a0b87f5b0e00d9dd364e9ddaa0', 'user', NULL, NULL),
(4, 'admin7', 'a3dcb4d229de6fde0db5686dee47145d', 'user', NULL, NULL),
(5, 'asdasdasd2', 'a8f5f167f44f4964e6c998dee827110c', 'user', NULL, NULL),
(6, 'asdasdasdasd', '56033378aa999ba9fd47d32922c4311c', 'user', NULL, NULL),
(7, 'M1nX', 'a3dcb4d229de6fde0db5686dee47145d', 'user', NULL, NULL),
(8, 'admin323', 'asdasdasdasdasda', 'user', '2023-04-27 15:50:35', '2023-04-27 15:50:35'),
(10, 'admin223123', 'efa0bf84cb475de3e47f2b760bd80e7a', 'user', '2023-04-27 15:51:59', '2023-04-27 15:51:59'),
(11, 'admin6', '21232f297a57a5a743894a0e4a801fc3', 'user', '2023-04-27 15:58:18', '2023-04-27 15:58:18'),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-04-27 15:59:13', '2023-04-27 15:59:13'),
(13, 'adminkk', '74b87337454200d4d33f80c4663dc5e5', 'user', '2023-04-27 16:46:01', '2023-04-27 16:46:01'),
(14, 'asdasdasdawawsqe', 'f20ad3cef65a2112c9af7ae2dc2d28c4', 'user', '2023-04-27 17:25:16', '2023-04-27 17:25:16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
