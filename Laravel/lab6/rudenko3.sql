-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2023 г., 20:06
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
-- База данных: `rudenko3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Firms`
--

CREATE TABLE `Firms` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `Firms`
--

INSERT INTO `Firms` (`id`, `Name`, `Adress`) VALUES
(1, 'ОАО Этажи', 'Тюмень, ул.Ленина, 35'),
(2, 'ООО Престиж', 'Тюмень, ул.Профсоюзная, 8'),
(3, 'ИП Зуевский', 'Тюмень, ул.Пирогова, 34-61');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_09_155847_create_people_table', 1),
(6, '2023_04_09_160039_create_firms_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `id` int NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `Staff` int NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Stage` int NOT NULL,
  `Image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `FIO`, `Staff`, `Phone`, `Stage`, `Image`, `created_at`, `updated_at`) VALUES
(5, 'Калугин', 3, '555555', 6, 'ava5.jpg', NULL, NULL),
(6, 'Веселина', 3, '666665', 8, 'ava6.jpg', NULL, NULL),
(7, 'Мистер Х', 2, '00-00-00', 3, 'ava1.jpg', '2017-12-05 17:40:47', '2017-12-05 17:40:47'),
(8, 'Мистер Х', 2, '00-00-00', 3, 'ava1.jpg', '2017-12-05 17:41:02', '2017-12-05 17:41:02'),
(10, 'Алейников', 1, '00-00-00', 3, 'ava4.jpg', '2017-12-10 16:20:15', '2017-12-10 16:20:15');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Staff`
--

CREATE TABLE `Staff` (
  `id` int NOT NULL,
  `staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `Staff`
--

INSERT INTO `Staff` (`id`, `staff`) VALUES
(1, 'Программист'),
(2, 'Менеджер'),
(3, 'Дизайнер'),
(4, 'Дворник');

-- --------------------------------------------------------

--
-- Структура таблицы `Vacancy`
--

CREATE TABLE `Vacancy` (
  `id` int NOT NULL,
  `Firm` int NOT NULL,
  `Staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `Vacancy`
--

INSERT INTO `Vacancy` (`id`, `Firm`, `Staff`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Firms`
--
ALTER TABLE `Firms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Staff` (`Staff`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Vacancy`
--
ALTER TABLE `Vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Firm` (`Firm`),
  ADD KEY `Staff` (`Staff`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Firms`
--
ALTER TABLE `Firms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Staff`
--
ALTER TABLE `Staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Vacancy`
--
ALTER TABLE `Vacancy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`Staff`) REFERENCES `Staff` (`id`);

--
-- Ограничения внешнего ключа таблицы `Vacancy`
--
ALTER TABLE `Vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`Firm`) REFERENCES `Firms` (`id`),
  ADD CONSTRAINT `vacancy_ibfk_2` FOREIGN KEY (`Staff`) REFERENCES `Staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
