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
-- Структура таблицы `naukas`
--

CREATE TABLE `naukas` (
  `id` int NOT NULL,
  `title` varchar(71) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lid` varchar(180) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `content` varchar(1460) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `rubric` varchar(58) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `naukas`
--

INSERT INTO `naukas` (`id`, `title`, `lid`, `created_at`, `content`, `rubric`, `image`, `updated_at`) VALUES
(1, 'Носимое устройство на базе ИИ отличает человека от машины по голосу', 'Команда австралийских исследователей из технологического агентства DT представила устройство для тех, кто боится, что скоро отличить человека от машины будет невозможно.', '0000-00-00 00:00:00', 'Носимая система под названием Anti-AI AI определяет синтетическую речь и предупреждает пользователя, что голос, который он слышит, не принадлежит человеку. Прототип устройства был разработан всего за пять дней. Он работает на нейронной сети на базе системы машинного обучения Tensorflow от Google.\nИсследователи натренировали искусственный интеллект, используя базу данных синтетических голосов. Так сеть научилась распознавать образцы искусственной речи. Носимое устройство захватывает звук и отправляет его в облако. Если оно распознаёт синтетическую речь, то тонко намекает человеку, что он общается не с себе подобным. Вместо того, чтобы предупреждать пользователя посредством света, звука или вибраций, прототип делает это с помощью миниатюрного термоэлектрического охлаждающего элемента. «Мы хотели, чтобы устройство давало носителю уникальное ощущение, которое соответствует тому, что он чувствует, когда понимает, что голос синтетический», — объяснили разработчики.', 'Распознавание образов', 'a4.jpg', '0000-00-00 00:00:00'),
(3, '\r\nНайдены области мозга, которые распознают летящий в лицо предмет', 'Французские нейробиологи, просканировав мозг двух макак-резусов, обнаружили регионы мозга, которые отвечают за предсказание столкновения с предметом и оценку возможных последствий.', '0000-00-00 00:00:00', 'Способность эффективно распознавать движущиеся объекты, определяя хищников и потенциальную добычу, необходима для выживания в джунглях. Ранее было показано, что быстро приближающийся к лицу объект, имитирующий движение хищника, вызывает защитную реакцию как у человекоподобных обезьян, так и у маленьких детей. Эти наблюдения предполагают, что мозг способен предсказывать траекторию движения угрожающих стимулов и оценивать возможные последствия от столкновения с ними. В новом исследовании французским ученым удалось зафиксировать активность мозга, сопряженную с подобной оценкой, и выяснить, какие именно регионы мозга за нее отвечают. Активность головного мозга двух макак-резусов измеряли при помощи имплантированной системы для функциональной магнитно-резонансной томографии. Анализ данных фМРТ выявил сеть нейронов, которые активизируются при обнаружении приближающегося к лицу предмета и столкновении с ним. Результаты исследования свидетельствуют, что мозг макак способен интегрировать данные от разных органов чувств, используя визуальную информацию для прогноза тактильных ощущений.', 'Искусственная нейронная сеть', 'a6.jpg', '0000-00-00 00:00:00'),
(5, '\r\nМедики обнаружили новое полезное свойство чтения', 'Привычка читать помогает людям развивать чувство эмпатии, то есть способность сопереживать другим.', '0000-00-00 00:00:00', 'К такому выводу пришли исследователи из США. Авторы исследования измеряли активность мозга в тот момент, когда участники эксперимента читали на трех разных языках. Оказалось, что чтение является универсальным средством, которое усиливает чувство эмпатии вне зависимости от происхождения человека или его родного языка. Ученые из Университета Южной Калифорнии обнаружили рисунки в активности мозга, которые отмечаются в тот момент, когда люди находили какой-то смысл в историях вне зависимости от своего языка. Исследователи применяли функциональную МРТ для наблюдений за реакцией мозга на чтение на английском, фарси или путунхуа (самый распространённый и официальный диалект в Китае). Результаты исследования позволяют предположить, что чтение оказывает очень широкий эффект в деле развития чувства эмпатии и собственного мироощущения человека. Эти выводы справедливы даже с учётом фундаментальных различий в языке, алфавите и порядке чтения. При чтении на всех трёх языках ученые наблюдали уникальные рисунки активности мозга в особых зонах. Данная нейронная сеть связывала области мозга вроде средней префронтальной коры и гиппокампа. Учёные считают, что чтение участвует в одном из самых загадочных для неврологов процессов, который определяет наше понимание мира. Именно посредством чтения в мозге человека формируются некоторые специфические представление об окружающих его явлениях и людях, которые имеют очень большое значение.', 'Искусственная нейронная сеть', 'a8.jpg', '0000-00-00 00:00:00'),
(6, '\r\nВласти передумали строить федеральную Wi-Fi-сеть в российских городах', 'В распоряжении CNews оказался проект Плана мероприятий по реализацию раздела «Информационная инфраструктура» программы «Цифровая экономика».', '0000-00-00 00:00:00', 'Документ разработан рабочей группой при центре компетенций по данному направлению, созданному на базе «Ростелекома». В документе не в полной мере отражены идеи, ранее заложенные в «Цифровую экономику» по данному пункту. В частности, программа предполагала строительство федеральной сети Wi-Fi. До конца 2020 г. планировалась запустить такие сети в двух российских городах-миллионниках и десяти городах с числом жителей от 100 тыс человек. Однако в проекте плана мероприятий об этом не говорится. Два источника, близких к соответствующей рабочей группе, подтвердили CNews, что проект строительства федеральной сети Wi-Fi в российских городах планируется исключить из программы «Цифровая экономика». Такое решение может быть связано с тем, что программа также предполагает строительстве сотовых пятого поколения (5G), что делает неочевидным необходимость в городских Wi-Fi-сетях. Несмотря на это, в документе остался пункт о создании производства в России оборудования для беспроводных сетей 802.16 ax (Wi-Fi со скоростями доступа до 2,5-5 Гбит/с). Также говорится о том, что при разработке национального плана обеспечения населения широкополосным доступом в интернет необходимо предусмотреть наличие Wi-Fi в общественных местах. Из дорожной карты программы «Цифровая экономика» исчез пункт о строительстве федеральной сети Wi-Fi. Сохранился и пункт об упрощении процедур регистрации точек доступа Wi-Fi мощностью до 100 мВт.', 'Информационное общество', 'a9.jpg', '0000-00-00 00:00:00'),
(10, 'Окунь', 'полез', '2023-04-27 18:56:23', 'в реку', 'Информационное общество', 'demo1.jpg', '2023-04-27 18:56:23'),
(11, 'фывфыв', 'фывфывфыв', '2023-04-27 18:57:36', 'фывфывфыв', 'Автоматическая обработка текста', 'demo1.jpg', '2023-04-27 18:57:36'),
(12, 'фвфыв', 'вфыфыв', '2023-04-27 18:57:59', 'фывфыфыв', 'Робототехника', 'heading_dots_grey.png', '2023-04-27 18:57:59'),
(15, 'фвыфыввц', 'фывячсячс', '2023-04-27 18:58:37', 'йуйвцвцв', 'Искусственная нейронная сеть', 'a1.jpg', '2023-04-27 18:58:37');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `naukas`
--
ALTER TABLE `naukas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `naukas`
--
ALTER TABLE `naukas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
