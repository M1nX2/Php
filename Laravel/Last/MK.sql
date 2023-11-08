-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2023 г., 19:12
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
-- База данных: `MK`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description1` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description3` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description4` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `description1`, `description2`, `description3`, `description4`, `foto_category`) VALUES
(1, 'Архитектурное моделирование', 'Архитектурное моделирование — это изготовление моделей зданий,\r\nсооружений, исторических памятников, а также\r\nинженерных и\r\nфортификационных\r\nсооружений.\r\nОтличительной\r\nособенностью\r\nобразовательной программы является то, что она значительно расширяет\r\nпространство для изучения народных традиций, дает начальные навыки\r\nдеревообработки, формирует эстетический вкус у учащихся.', 'Данная программа не имеет аналогов среди образовательных\r\nдополнительных программ, так как впервые для изготовления макетов\r\nприменяются бамбуковые палочки, в качестве основного элемента\r\nконструкции, что позволяет значительно упростить технологию создания\r\nмакета и обучить начальным навыкам деревообработки.', 'Актуальность предлагаемой программы состоит в том, что мастер-\r\nклассы по архитектурному моделированию способствуют воспитанию\r\nхудожественно-эмоционального отношения к работе и творчеству, готовым\r\nизделиям; умению наблюдать и создавать образы, композиции,\r\nархитектурные ансамбли, ландшафтные построения; овладению навыками\r\nдизайна; воспитанию бережного отношения к культурному наследию своего\r\nгорода, России; воспитанию гордости за свой народ, поддержание интереса к\r\nего истории и культуре.', 'На занятиях учащиеся получают теоретические знания по\r\nдревнерусской архитектуре и народным традициям, изучают краеведческий\r\nматериал, применяют знания на практике, создавая исторические\r\nреконструкции зданий и сооружений.', '[wallcoo]_paper_model_of_landmark_famous_buildings_EA43013.jpg'),
(2, 'Кулинария', 'Кулинария – искусство приготовления пищи. Еда – это топливо, на\r\nкотором работает организм, и знать об этом топливе, уметь грамотно его\r\nиспользовать должен любой человек. К сожалению, в большинстве случаев\r\nинтерес к проблеме питания возникает с годами, когда большинство\r\nпродуктов оказывается вредным для растущего организма.', 'Великие тайны кулинарии откроются перед теми, кто захочет\r\nнаучиться готовить по всем правилам, превращать сырые продукты во\r\nвкусную и полезную пищу. Умение хорошо, то есть правильно, вкусно и\r\nбыстро, готовить является одним из условий счастливой, спокойной жизни.', '«В здоровом теле – здоровый дух!» - настроение, здоровье, готовность\r\nтрудиться во многом зависит от питания и отдыха. Важно не только\r\nправильно готовить, но и правильно питаться, регулировать не только объём\r\nпищи, но и её качество. Излишняя полнота и другие функциональные\r\nнарушения организма часто являются следствием неправильного питания.\r\nВладение кулинарией требует большого объёма знаний и навыков,\r\nзначительной культуры и эрудиции, чтобы соответствовать современным\r\nтребованиям.', 'Мы стремимся возродить традиции семейных праздников и здорового\r\nпитания. Полученные знания помогут не только накормить семью, но и\r\nпринять гостей.', 'hqdefault.jpg'),
(3, 'Резьба по дереву', 'Резьба по дереву - древнейший вид русского народного декоративного\r\nискусства. В нашей стране, богатой лесами, дерево всегда было одним из\r\nсамых любимых материалов. Понимание его пластических качеств, красоты\r\nтекстуры развивалось в творческом опыте многих поколений народных\r\nмастеров.', 'Высокий уровень исполнительского мастерства, образная и\r\nпоэтическая выразительность деревянных изделий всегда соединялись с\r\nутилитарным назначением вещей. Это во многом определяло и способы\r\nхудожественной обработки, и характер орнаментального декора,\r\nсохраняющий единство как в монументальных произведениях домовой\r\nрезьбы или скульптуры, так и в оформлении домашней утвари, начиная от\r\nткацкого стана, прялки, рубеля и кончая деревянной посудой и детской\r\nигрушкой', 'Замечательное мастерство резьбы по дереву в наши дни развивают\r\nсовременные художники и мастера предприятий народных художественных\r\nпромыслов.', 'Учитывая особенности каждого из традиционных центров\r\nхудожественной резьбы по дереву, программа ставит своей целью\r\nпознакомить учащихся с наследием художественной обработки дерева в\r\nкаждом районе промысла, привить им любовь к традиционному\r\nхудожественному ремеслу, обучить практическим навыкам резьбы по дереву,\r\nумению создавать собственные творческие композиции в традициях\r\nместного художественного промысла.', '222601.jvrsx4.5g5r.qe.hl.png');

-- --------------------------------------------------------

--
-- Структура таблицы `leader`
--

CREATE TABLE `leader` (
  `id_leader` int NOT NULL,
  `first_name_leader` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name_leader` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic_leader` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_leader` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_leader` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_leader` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `leader`
--

INSERT INTO `leader` (`id_leader`, `first_name_leader`, `second_name_leader`, `patronymic_leader`, `foto_leader`, `login_leader`, `password_leader`) VALUES
(1, 'Веселова', 'Оксана', 'Ивановна', 'driver1.png', 'oksana', '2af9b1ba42dc5eb01743e6b3759b6e4b'),
(2, 'Киселёва', 'Виктория', 'Анатольевна', 'image.png', 'vika', '2af9b1ba42dc5eb01743e6b3759b6e4b'),
(3, 'Сингапур', 'Магомед', 'Игоревич', 'driver3.png', 'singa', '2af9b1ba42dc5eb01743e6b3759b6e4b');

-- --------------------------------------------------------

--
-- Структура таблицы `masterclass`
--

CREATE TABLE `masterclass` (
  `id_MC` int NOT NULL,
  `name_MC` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_MC` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_MC` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_people_MC` int NOT NULL DEFAULT '0',
  `cost_MC` int NOT NULL,
  `id_category` int NOT NULL,
  `id_leader` int NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `masterclass`
--

INSERT INTO `masterclass` (`id_MC`, `name_MC`, `description_MC`, `date_MC`, `count_people_MC`, `cost_MC`, `id_category`, `id_leader`, `updated_at`, `created_at`) VALUES
(1, 'Резьба по дереву', 'Данный мастер-класс для начинающих, знакомит с \r\nрезьбой, с самых основных элементов.', '2023-06-19T11:00', 8, 800, 3, 1, '2023-06-09 08:26:55', '2023-06-09 08:26:55'),
(6, 'Готовка по Русски', 'Научим готовить самые популярные русские блюда, такие как пельмени и пиво, Солёная селёдка домашнего приготовления, Окрошка, и многие другие', '2023-06-18T11:00', 12, 12030, 2, 1, '2023-06-09 08:50:16', '2023-06-09 08:50:16'),
(10, 'Приготовление Мяса', 'Учимся готовить мясо вместе с шеф поваром из москвы Константином Ивлевым', '2023-06-21T15:00', 33, 2541, 2, 2, '2023-06-09 08:58:34', '2023-06-09 08:58:34'),
(11, 'Моделирование моделей', 'Мастер-класс «Моделирование моделей» научит основам\nмоделирования различных. Ученики строят,\nиспытывают и запускают модели.', '2023-06-17T11:00', 12, 523, 1, 2, '2023-06-09 08:59:45', '2023-06-09 08:59:45'),
(12, 'Моделирование зданий', 'Моделировать здания.', '2023-06-10T11:00', 1, 10002, 1, 3, '2023-06-09 09:01:29', '2023-06-09 09:01:29'),
(13, 'Крутая  резьба по дереву', 'Самая крутая резьба по дереву', '2023-06-20T11:00', 14, 10000, 3, 3, '2023-06-09 09:02:31', '2023-06-09 09:02:31'),
(18, 'jjjjj', '322332', '2023-06-10T11:00:00', 23, 230, 1, 1, '2023-06-15 11:35:38', '2023-06-15 11:35:38'),
(19, '2', '2', '2023-06-10T13:00:00', 2, 2, 1, 1, '2023-06-15 12:02:18', '2023-06-15 12:02:18'),
(20, '3', '2', '2023-06-10T11:00:00', 2, 2, 1, 1, '2023-06-15 12:02:55', '2023-06-15 12:02:55'),
(21, 'ghdghhd', 'gdfgdfg', '2023-06-17T11:00:00', 3, 200, 1, 1, '2023-06-15 14:31:17', '2023-06-15 14:31:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `FIO_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `FIO_user`, `email_user`, `telephone_user`, `password_user`, `updated_at`, `created_at`) VALUES
(1, 'Евгений Александрович Березкин', '123@mail.ru', '+79999999993', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-09 06:08:42', '2023-06-09 06:08:42'),
(2, 'Глыбина Антонина Андреевна', '234@mail.ru', '+71234567899', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-09 06:13:17', '2023-06-09 06:13:17'),
(4, 'Руденко Евгений Александрович', 'Zhenya23082003A@gmail.com', '+78005553535', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-14 15:11:07', '2023-06-14 15:11:07'),
(5, 'Дмитрий Масленников Аа', 'mail@mail.ru', '+777777777', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-14 15:19:51', '2023-06-14 15:19:51'),
(6, 'ФЫВ Фыв Фыв', 'mail2@mail.ru', '+79999999', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-14 15:21:37', '2023-06-14 15:21:37'),
(7, 'ФЫВ Фыв Фыв', 'mail23@mail.ru', '+78005553536', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-14 15:21:54', '2023-06-14 15:21:54'),
(8, 'Иванов Иван Иванович', 'mail3@mail.ru', '+78005553531', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-14 15:31:40', '2023-06-14 15:31:40'),
(9, 'Иванов Иван Иванович', 'mail4@mail.ru', '+7(236)3256030', 'd137043cbd9a0f3eddf22667c934959f', '2023-06-15 12:54:43', '2023-06-15 12:54:43'),
(10, 'Шеремет Арсений Андреевич', 'senya@mail.ru', '88005553535', '2af9b1ba42dc5eb01743e6b3759b6e4b', '2023-06-15 14:56:56', '2023-06-15 14:56:56');

-- --------------------------------------------------------

--
-- Структура таблицы `user_mc`
--

CREATE TABLE `user_mc` (
  `id_user_mc` int NOT NULL,
  `id_MC` int NOT NULL,
  `id_user` int NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_mc`
--

INSERT INTO `user_mc` (`id_user_mc`, `id_MC`, `id_user`, `updated_at`, `created_at`) VALUES
(6, 10, 2, '2023-06-09 21:34:36', '2023-06-09 21:34:36'),
(17, 11, 1, '2023-06-09 23:13:02', '2023-06-09 23:13:02'),
(18, 6, 1, '2023-06-09 23:14:55', '2023-06-09 23:14:55'),
(19, 12, 3, '2023-06-09 23:58:44', '2023-06-09 23:58:44'),
(20, 6, 3, '2023-06-09 23:58:52', '2023-06-09 23:58:52'),
(21, 6, 4, '2023-06-14 15:57:14', '2023-06-14 15:57:14'),
(30, 11, 4, '2023-06-15 14:04:05', '2023-06-15 14:04:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id_leader`);

--
-- Индексы таблицы `masterclass`
--
ALTER TABLE `masterclass`
  ADD PRIMARY KEY (`id_MC`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_mc`
--
ALTER TABLE `user_mc`
  ADD PRIMARY KEY (`id_user_mc`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `leader`
--
ALTER TABLE `leader`
  MODIFY `id_leader` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `masterclass`
--
ALTER TABLE `masterclass`
  MODIFY `id_MC` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_mc`
--
ALTER TABLE `user_mc`
  MODIFY `id_user_mc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
