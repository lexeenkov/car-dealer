-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Verzia PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `wa1_en`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sportcar_cars`
--

CREATE TABLE `sportcar_cars` (
  `idc` smallint(6) NOT NULL,
  `car_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `power` smallint(6) NOT NULL,
  `speed` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `sportcar_cars`
--

INSERT INTO `sportcar_cars` (`idc`, `car_name`, `power`, `speed`) VALUES
(1, 'Aston Martin DBS Coupe', 380, 350),
(2, 'Bugatti Veyron 16.4', 736, 407),
(3, 'Ferrari 599 GTB Fiorano', 456, 331),
(4, 'Lamborghini Aventador LP 700-4', 515, 350),
(5, 'Maserati GranTurismo MC Stradale', 331, 301),
(6, 'Porsche 911 Carrera S', 283, 302);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sportcar_rating`
--

CREATE TABLE `sportcar_rating` (
  `idc` smallint(6) NOT NULL,
  `uid` smallint(6) NOT NULL,
  `points` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `sportcar_rating`
--

INSERT INTO `sportcar_rating` (`idc`, `uid`, `points`) VALUES
(1, 2, 5),
(1, 4, 4),
(3, 4, 5);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sportcar_terms`
--

CREATE TABLE `sportcar_terms` (
  `idt` smallint(6) NOT NULL,
  `idc` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `uid` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `sportcar_terms`
--

INSERT INTO `sportcar_terms` (`idt`, `idc`, `date`, `uid`) VALUES
(2, 1, '2020-06-17', 0),
(4, 1, '2020-06-28', 0),
(6, 2, '2020-06-23', 0),
(7, 2, '2020-06-22', 0),
(12, 1, '2020-06-21', 0),
(13, 1, '2020-06-23', 0),
(16, 1, '2020-06-26', 0),
(17, 3, '2020-06-25', 0),
(18, 4, '2020-06-26', 0),
(20, 4, '2020-07-01', 0),
(21, 6, '2020-06-25', 0),
(22, 6, '2020-06-26', 0),
(23, 6, '2020-07-02', 0),
(24, 1, '2020-06-20', 0),
(25, 1, '2020-06-07', 0),
(28, 1, '2020-06-08', 0),
(29, 1, '2020-06-09', 0),
(30, 1, '2020-06-10', 0),
(37, 1, '2020-07-11', 0),
(38, 1, '2020-07-12', 2),
(39, 1, '2020-07-18', 0),
(40, 1, '2020-07-19', 0),
(41, 3, '2020-05-12', 0),
(42, 3, '2020-07-12', 0),
(45, 3, '2020-07-11', 4);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sportcar_users`
--

CREATE TABLE `sportcar_users` (
  `uid` smallint(6) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `sportcar_users`
--

INSERT INTO `sportcar_users` (`uid`, `username`, `pass`, `name`, `surname`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'System', 'Administrator', 1),
(2, 'uwa', '78f0f32c08873cfdba57f17c855943c0', 'user', 'UWA', 0),
(3, 'ferrari', '0911054d8ad47cc256400031197f3e97', 'Enzo', 'Ferrari', 1),
(4, 'roman', 'b179a9ec0777eae19382c14319872e1b', 'Roman', 'Hrušecký', 0),
(5, 'jozko', '256f035bd7cf72238fad007fb9199c66', 'Jožko', 'Púčik', 0),
(6, 'mrkva', 'bfd7d9c62540ed72de0f32932077bef7', 'Janko', 'Mrkvička', 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `sportcar_cars`
--
ALTER TABLE `sportcar_cars`
  ADD PRIMARY KEY (`idc`);

--
-- Indexy pre tabuľku `sportcar_rating`
--
ALTER TABLE `sportcar_rating`
  ADD PRIMARY KEY (`idc`,`uid`);

--
-- Indexy pre tabuľku `sportcar_terms`
--
ALTER TABLE `sportcar_terms`
  ADD PRIMARY KEY (`idt`),
  ADD UNIQUE KEY `car_terms` (`idc`,`date`);

--
-- Indexy pre tabuľku `sportcar_users`
--
ALTER TABLE `sportcar_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `sportcar_cars`
--
ALTER TABLE `sportcar_cars`
  MODIFY `idc` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `sportcar_terms`
--
ALTER TABLE `sportcar_terms`
  MODIFY `idt` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pre tabuľku `sportcar_users`
--
ALTER TABLE `sportcar_users`
  MODIFY `uid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
