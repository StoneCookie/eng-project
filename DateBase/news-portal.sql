-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2020 г., 04:10
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news-portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Пережогин Федор Владимирович', 'pravsha63@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `theme_id`, `author_id`, `title`, `description`, `date`, `img`) VALUES
(1, 5, 1, 'Всегда на связи', 'Как управлять бизнесом на расстоянии и избежать проблем', '2020-05-20', 'businessman.jpg'),
(2, 1, 1, 'Запоздалый триумф', '«Сити» громит соперника, «Ливерпуль» теряет очки — главные события первой после рестарта недели АПЛ', '2020-05-21', 'footballers.jpg'),
(3, 4, 3, '«Ты же русский, может, у тебя и получится»', 'Как россиянин отправился покорять Турцию на велосипеде и сразился с собачьей стаей', '2020-05-28', 'russian-guy.jpg'),
(4, 3, 1, 'Что мы там не видели', 'Поющие рыбаки, абсурд: над чем шутит голливудская комедия про «Евровидение»', '2020-05-22', 'film.jpg'),
(5, 6, 2, '«Слухи подпитывали страхи»', 'Почему Сталин скрывал от народа правду о Великой Отечественной войне', '2020-05-25', 'soldiery.jpg'),
(6, 8, 3, 'Тайна раскрыта!', 'Раскрыто тайное значение цветов нарядов Кейт Миддлтон', '2020-05-29', 'middlton.jpg'),
(7, 4, 1, '«От ужаса я начал шептать»', 'Туристы отправились покорять океан на старой лодке и едва не погибли. Как им удалось выжить?\r\n', '2020-05-23', 'ship.jpg'),
(8, 7, 2, '«Братья и сестры, мы победили»', 'Чудеса, разрушение мифов и смерть культур на снимках известных фотографов', '2020-05-26', 'boats.png'),
(9, 10, 3, 'Из того, что было', 'Как дешевый iPhone SE стал спасением для Apple', '2020-05-30', 'iPhoneSE.jpg'),
(10, 9, 1, 'Машина оплошностей', 'Слабоумие и харассмент — с чем идет на выборы главный соперник Трампа?', '2020-05-24', 'politician.jpg'),
(11, 2, 2, '«Порой у него бывали странные закидоны»', 'Жизнь и смерть Майка Науменко и его «Зоопарка»', '2020-05-27', 'Naumenko.jpg'),
(12, 5, 3, 'Все пойдет по плану', 'Как правительство и банки помогают малому и среднему бизнесу', '2020-05-31', 'Engineer.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`) VALUES
(1, 'Сидоров Евгений Анатольевич', 'sidor@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Шатунов Олег Иванович', 'shatunov@gmail.com', '01cfcd4f6b8770febfb40cb906715822'),
(3, 'Рогов Павел Владимирович', 'rogov@yandex.ru', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribe`
--

INSERT INTO `subscribe` (`id`, `user_id`, `theme_id`) VALUES
(5, 9, 6),
(6, 8, 2),
(7, 8, 5),
(9, 8, 4),
(11, 8, 9),
(12, 8, 6),
(13, 11, 3),
(14, 11, 7),
(16, 1, 6),
(18, 1, 1),
(19, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `name`) VALUES
(1, 'спорт'),
(2, 'музыка'),
(3, 'кино'),
(4, 'путешествия'),
(5, 'экономика'),
(6, 'история'),
(7, 'искусство'),
(8, 'мода'),
(9, 'политика'),
(10, 'технологии');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ананьев Влад Алексеевич', 'ananev@mail.ru', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
