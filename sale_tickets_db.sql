-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 08 2020 р., 10:03
-- Версія сервера: 5.6.41
-- Версія PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `sale_tickets_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `afisha`
--

CREATE TABLE `afisha` (
  `id` int(11) NOT NULL,
  `film` int(11) DEFAULT NULL,
  `cinema` int(11) DEFAULT NULL,
  `hall` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` char(100) DEFAULT NULL COMMENT 'Название',
  `adress` text COMMENT 'Адрес',
  `icon` text COMMENT 'Иконка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `adress`, `icon`) VALUES
(2, 'Palladium Cinema', 'г.Харьков, провулок Костюринський 2', 'https://image.winudf.com/v2/image/Y29tLnBhbGxhZGl1bS5wYWxsYWRpdW1jaW5lbWFfaWNvbl8wXzM5ZTJjNzJk/icon.png?w=170&fakeurl=1'),
(3, 'Multiplex ТРЦ «Дафи»', 'г.Харьков, вулиця Героїв Праці 9', 'https://image.winudf.com/v2/image1/Y29tLmludGVycHJldGF0b3IubXVsdGlwbGV4X2ljb25fMTU2ODA5NDE3OV8wMzg/icon.png?w=170&fakeurl=1'),
(4, 'Planeta Kino IMAX ТРЦ «Французький Бульвар»', 'г.Харьков, вулиця Академіка Павлова 44Б', 'https://centersocial.org/wp-content/uploads/2014/03/planeta-kino.png'),
(6, 'Filmax ТРЦ «КЛАСС»', 'г.Харьков, вулиця Дудинської 1-А', 'https://i.otzovik.com/objects/b/1390000/1382924.png');

-- --------------------------------------------------------

--
-- Структура таблиці `favorite_cinemas`
--

CREATE TABLE `favorite_cinemas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cinema_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` char(100) DEFAULT NULL COMMENT 'Название',
  `year` year(4) DEFAULT NULL,
  `country` char(10) DEFAULT NULL,
  `lang` char(20) DEFAULT NULL,
  `genre` char(100) DEFAULT NULL COMMENT 'Жанр',
  `duration` char(20) DEFAULT NULL COMMENT 'Продолжительность',
  `rental` char(20) DEFAULT NULL COMMENT 'Прокат с',
  `trailer` text,
  `poster` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `films`
--

INSERT INTO `films` (`id`, `title`, `year`, `country`, `lang`, `genre`, `duration`, `rental`, `trailer`, `poster`) VALUES
(1, 'Чудо-женщина', 2020, 'США', 'украинский', 'боевик, драма', '1час 43мин', 'С 4 апреля 2020', 'https://www.youtube.com/embed/4AjF0F6CBVc', 'https://www.hdclub.ua/files/film/big/bigi59c566175b7d7.jpg'),
(2, 'Дикие птицы', 2020, 'США', 'украинский', 'Боевик, Супергеройский фильм', '1час 49мин', 'С 29 января 2020', 'https://www.youtube.com/embed/W_jGHWpfrsg\r\n', 'https://f10.pmo.ee/6JZz8rAYwDBv9271egNOrrBVXEM=/685x0/filters:focal(909x447:1540x1334)/nginx/o/2020/01/28/12900728t1h0cbe.jpg'),
(3, 'Лёд 2', 2020, 'Россия', 'Русский', 'Романтический фильм, Спорт', '2часа 12мин', 'С 14 февраля 2020', 'https://www.youtube.com/embed/9c3Z4Hp4tWM', 'https://st.kp.yandex.net/images/film_iphone/iphone360_1227963.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `cinamas` int(11) NOT NULL,
  `rows_number` int(11) DEFAULT NULL,
  `places_of_rows` int(11) DEFAULT NULL,
  `default_price` int(11) DEFAULT NULL,
  `additional_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `cinema` int(11) NOT NULL,
  `film` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cinema_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `seat` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `number_phone` char(12) DEFAULT NULL,
  `password` text,
  `time_registration` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата регистрации',
  `level` int(5) DEFAULT NULL,
  `phone_number` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `number_phone`, `password`, `time_registration`, `level`, `phone_number`) VALUES
(3, 'Ярослав', 'yaroslav@mail.ru', '0663292768', '$2y$10$lp.37faMkwF/JH3LFSqwd.tZZ2JtCe0Zf2RFYxDFpUA.UE.nawMCW', '2020-04-01 09:46:02', 2, 456);

-- --------------------------------------------------------

--
-- Структура таблиці `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `afisha`
--
ALTER TABLE `afisha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film` (`film`),
  ADD KEY `cinema` (`cinema`),
  ADD KEY `hall` (`hall`);

--
-- Індекси таблиці `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `favorite_cinemas`
--
ALTER TABLE `favorite_cinemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Індекси таблиці `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`cinamas`);

--
-- Індекси таблиці `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema` (`cinema`),
  ADD KEY `film` (`film`);

--
-- Індекси таблиці `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `afisha`
--
ALTER TABLE `afisha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `favorite_cinemas`
--
ALTER TABLE `favorite_cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `afisha`
--
ALTER TABLE `afisha`
  ADD CONSTRAINT `afisha_ibfk_1` FOREIGN KEY (`cinema`) REFERENCES `cinemas` (`id`),
  ADD CONSTRAINT `afisha_ibfk_2` FOREIGN KEY (`film`) REFERENCES `films` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`cinamas`) REFERENCES `cinemas` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`cinema`) REFERENCES `cinemas` (`id`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`film`) REFERENCES `films` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
